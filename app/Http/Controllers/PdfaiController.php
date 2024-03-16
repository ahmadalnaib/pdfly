<?php

namespace App\Http\Controllers;

use App\Models\Pdfai;
use Spatie\PdfToText\Pdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PdfaiController extends Controller
{
  
    public function index()
    {
        $docs = auth()->user()->pdfais()->latest()->paginate(8);
        return view('pdf.index',compact('docs'));
    }

    public function create()
    {
        // this is 
        return view('pdf.create');
    }

    public function store(Request $request)
    {

        $user = $request->user();

    // Check if the user has credits
    if ($user->credits <= 0) {
        // The user has no credits left
        return redirect()->back()->withErrors(['error' => 'No credits left. Please purchase more to continue using this feature.']);
    }

    try {
    $request->validate(['pdf' => 'required|file|mimes:pdf|max:1000']);
        
        $file = $request->file('pdf');
        $originalName = $file->getClientOriginalName();
        $filePath = $file->store('public/pdfs');
        
        $pdfFile = Pdfai::create([
            'slug' => Str::slug($originalName) . '-' . time(),
            'original_name' => $originalName,
            'file_path' => $filePath,
            'user_id' => $user->id, 
        ]);
        
        // $text = (new \Spatie\PdfToText\Pdf('C:\\Program Files\\poppler-24.02.0\\Library\\bin\\pdftotext.exe'))
        //  $binPath = '/opt/homebrew/bin/pdftotext';
        //  $text = (new Pdf($binPath))
            $binPath = '/usr/bin/pdftotext';
          $text = (new Pdf($binPath))
        ->setPdf(storage_path('app/'.$filePath))
        ->text();
        session(['pdf_text' => $text]);
        // Improved language detection
        $isArabic = $this->isLikelyArabic($text);

        
        // $analysis = $this->analyzePdfAndFetchResponse($text, $isArabic);

            // Decrement the user's credits
    $user->credits--;
    $user->save();

    
        
      // Instead of redirecting back, pass the necessary data to a view
      return view('pdf.result', [
        'filePath' => $filePath,
        // 'analysis' => $analysis
    ]);
}catch (ValidationException $e) {
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


//  protected function analyzePdfAndFetchResponse($text, $isArabic)
// {
//     // Adjust model based on language detection
//     $model = $isArabic ? 'gpt-3.5-turbo' : 'gpt-3.5-turbo'; // Example, adjust as needed
//     $promptLanguage = $isArabic ? "Please analyze this text in Arabic." : "Please analyze this text in Arabic.";

//     $response = OpenAI::chat()->create([
//         'model' => $model,
//         'messages' => [
//             ['role' => 'user', 'content' => $promptLanguage . "\n\n" . $text],
//         ],
     
//     ]);

//     // Handle the response...
//     return $response['choices'][0]['message']['content'];
// }

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
    $pdfText = $this->truncateText($pdfText, 3000); // Limit the text for efficiency

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
    $systemMessage = 'You are an assistant that answers questions about a specific document. You should respond in ' . $language . '.';
    // $prompt = substr($prompt, 0, 1000);
    $response = OpenAI::chat()->create([
        'model' => 'gpt-3.5-turbo-16k',
        'max_tokens' => 500,
        'messages' => [
            ['role' => 'system', 'content' => $systemMessage],
            ['role' => 'user', 'content' => $prompt],
        ],
    ]);

    return $response['choices'][0]['message']['content'];
}


// protected function truncateText($text, $limit)
// {
//     $words = explode(' ', $text);
//     if (count($words) > $limit) {
//         $words = array_slice($words, 0, $limit);
//         $text = implode(' ', $words);
//     }
//     return $text;
// }
protected function truncateText($text, $limit)
{
    return substr($text, 0, $limit);
}

public function show(Pdfai $pdfai)
{
    
    $filePath = $pdfai->file_path;
    
    $binPath = '/usr/bin/pdftotext';
    $text = (new Pdf($binPath))
  ->setPdf(storage_path('app/'.$filePath))
  ->text();
  session(['pdf_text' => $text]);

    // $text = (new \Spatie\PdfToText\Pdf('C:\\Program Files\\poppler-24.02.0\\Library\\bin\\pdftotext.exe'))
    //     ->setPdf(storage_path('app/'.$filePath))
    //     ->text();

    // session(['pdf_text' => $text]);

    // Replace 'public' with 'storage' in the file path for the asset function
    $assetPath = str_replace('public', 'storage', $filePath);

    return view('pdf.show', ['filePath' => $assetPath]);
}

    public function destroy(Pdfai $doc)
    {
        // Delete the file from the storage
        Storage::delete($doc->file_path);
    
        // Delete the model instance from the database
        $doc->delete();
    
        // Redirect the user back to the index page
        return redirect()->route('pdf.index');
    }


}
