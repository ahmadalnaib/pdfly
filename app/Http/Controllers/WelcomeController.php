<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Support\Str;
use App\Models\Pdftemporary;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $userIp = $request->ip();
        $sessionId = $request->session()->getId();
         // Check if the IP address is already in the cache
         if (Upload::where('ip_address', $userIp)->where('session_id', $sessionId)->exists()) {
            return redirect()->back()->withErrors(['error' => 'You can only upload a file once.']);
        }


        try {
            $request->validate(['pdf' => 'required|file|mimes:pdf']);
            
            $file = $request->file('pdf');
            $originalName = $file->getClientOriginalName();
            $filePath = $file->getRealPath();
            $filePath = $file->store('public/pdftemporary');
        
            $pdfFile = Pdftemporary::create([
                'slug' => Str::slug($originalName) . '-' . time(),
                'original_name' => $originalName,
                'file_path' => $filePath,
            ]);
            
            $text = (new \Spatie\PdfToText\Pdf('C:\\Program Files\\poppler-24.08.0\\Library\\bin\\pdftotext.exe'))
            ->setPdf(storage_path('app/'.$filePath))
                ->setOptions(['-layout', '-enc UTF-8', '-r 300'])
                ->text();

            session(['pdf_text' => $text]);

            $summary = $this->generateSummary($text);
            $questions = $this->generateQuestions($text);
            // Improved language detection
            $isArabic = $this->isLikelyArabic($text);

            Upload::create([
                'ip_address' => $userIp,
                'session_id' => $sessionId,
            ]);
            // Instead of redirecting back, pass the necessary data to a view
            return view('result', [
                'filePath' => $filePath,
                'summary' => $summary,
                'questions' => $questions,
            ]);
        } catch (ValidationException $e) {
            // Handle the validation exception
            return redirect()->back()
                             ->withErrors($e->validator)
                             ->withInput();
        }
    }

    protected function isLikelyArabic($text)
    {
        // More robust Arabic detection
        $arabicPattern = '/[\x{0600}-\x{06FF}]/u';
        return preg_match($arabicPattern, $text);
    }

    public function askQuestion(Request $request)
{
    $validated = $request->validate([
        'question' => 'required|string|max:255',
        'language' => 'required|string|max:255',
    ]);
    $question = $validated['question'];
    $language = $validated['language'];

    // Generate a unique cache key based on the question
    $cacheKey = 'askQuestion_'.md5($question);
    
    
    // Try to get the answer from cache
    $cachedAnswer = Cache::get($cacheKey);
    if ($cachedAnswer) {
        return response()->json(['question' => $question, 'answer' => $cachedAnswer]);
    }

    // If not in cache, proceed with processing
    $pdfText = session('pdf_text'); // Retrieve stored text
    $pdfText = mb_convert_encoding($pdfText, 'UTF-8');

    // Generate summary and questions here

    $pdfText = $this->truncateText($pdfText, 200000); // Limit the text for efficiency

    // Construct the prompt for OpenAI
    $prompt = "Document: " . $pdfText . "\n\n" . "Question: " . $question;

    // Call OpenAI API
    try {
        $answer = $this->getAnswerFromOpenAI($prompt ,$language);
    } catch (\Exception $e) {
        // Handle exception (log it, show an error message, etc.)
        return response()->json(['error' => 'Could not get an answer from OpenAI.']);
    }

    // Check if the answer is not known, and provide a default response
    if (strpos(strtolower($answer), "i don't know") !== false) {
        return response()->json(['question' => $question, 'answer' => 'يرجى طرح سؤال حول الوثيقة.']);
    }

    // Cache the answer for future use to improve response time
Cache::put($cacheKey, $answer, now()->addSeconds(30));

    return response()->json(['question' => $question, 'answer' => $answer]);
}

protected function getAnswerFromOpenAI($prompt,$language)
{
     // Ensure input text is properly encoded in UTF-8
     $prompt = mb_convert_encoding($prompt, 'UTF-8');
    $systemMessage = 'You are an assistant that answers questions about a specific document. You should respond in ' . $language . '.';
    // $prompt = substr($prompt, 0, 1000);
    $response = OpenAI::chat()->create([
        'model' => 'gpt-4o',
       // 'max_tokens' => 16384,
        'messages' => [
            ['role' => 'system', 'content' => $systemMessage],
            ['role' => 'user', 'content' => $prompt],
        ],
    ]);

    return $response['choices'][0]['message']['content'];
}

protected function generateSummary($text)
{

 // Ensure input text is properly encoded in UTF-8
 $text = mb_convert_encoding($text, 'UTF-8');

 if (mb_strlen($text, 'UTF-8') > 10000) {
     // Truncate text if it exceeds 10000 characters
     $text = mb_substr($text, 0, 10000, 'UTF-8');
 }

    $systemMessage = "Summarize the following text in arabic:";
    
    // Construct the prompt with the system message followed by the actual text
    $prompt = $systemMessage . "\n\n" . $text;

    // Make the API call
    $response = OpenAI::chat()->create([
        'model' => 'gpt-4o',
      // 'max_tokens' => 16384,

        'messages' => [
            ['role' => 'system', 'content' => $systemMessage],
            ['role' => 'user', 'content' => $prompt],
        ],
    ]);

    // Assuming the API response is structured with the summary in the 'content' of the first 'message'
    // You might need to adjust this based on the actual structure of the response you receive
    return $response['choices'][0]['message']['content'];
}


protected function generateQuestions($text)
{

      // Ensure input text is properly encoded in UTF-8
      $text = mb_convert_encoding($text, 'UTF-8');

      if (mb_strlen($text, 'UTF-8') > 10000) {
        // Truncate text if it exceeds 10000 characters
        $text = mb_substr($text, 0, 10000, 'UTF-8');
    }

    // Defining the system message to guide the AI on what we expect, explicitly asking for Arabic
    $systemMessage = "Generate three insightful questions based on the provided document You should respond in arabic";

    // Making the API call
    $response = OpenAI::chat()->create([
      
        'model' => 'gpt-4o', // Use the specified model
       // 'max_tokens' => 16384,
        'temperature' => 0.5, // A lower temperature for more deterministic output
        'messages' => [
            ['role' => 'system', 'content' => $systemMessage],
            // Ensure your document text is in Arabic or appropriately request Arabic questions
            ['role' => 'user', 'content' => "الوثيقة: \n\n" . $text]
        ],
    ]);

    // Assuming the response contains a list of questions in Arabic
    $questionsText = $response['choices'][0]['message']['content'];

    $questions = explode("\n", trim($questionsText));

    return array_filter($questions, function($question) {
        // Filter out any empty questions
        return !empty(trim($question));
    });
}

protected function truncateText($text, $limit)
{
    return substr($text, 0, $limit);
}

}