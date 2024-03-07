<?php

namespace App\Http\Controllers;

use App\Models\Pdfai;
use Spatie\PdfToText\Pdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Storage;

class PdfaiController extends Controller
{
  
    public function index()
    {
        $docs = auth()->user()->pdfais()->latest()->paginate(8);
        return view('pdf.index',compact('docs'));
    }

    public function create()
    {
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
        $request->validate(['pdf' => 'required|file|mimes:pdf|max:2048']);
        
        $file = $request->file('pdf');
        $originalName = $file->getClientOriginalName();
        $filePath = $file->store('public/pdfs');
        
        $pdfFile = Pdfai::create([
            'slug' => Str::slug($originalName) . '-' . time(),
            'original_name' => $originalName,
            'file_path' => $filePath,
            'user_id' => $user->id, 
        ]);
        
         $text = (new \Spatie\PdfToText\Pdf('C:\\Program Files\\poppler-24.02.0\\Library\\bin\\pdftotext.exe'))
        //  $binPath = '/opt/homebrew/bin/pdftotext';
        //  $text = (new Pdf($binPath))
        ->setPdf(storage_path('app/'.$filePath))
        ->text();
        session(['pdf_text' => $text]);
        // Improved language detection
        $isArabic = $this->isLikelyArabic($text);

        
        $analysis = $this->analyzePdfAndFetchResponse($text, $isArabic);

            // Decrement the user's credits
    $user->credits--;
    $user->save();

    
        
      // Instead of redirecting back, pass the necessary data to a view
      return view('pdf.result', [
        'filePath' => $filePath,
        'analysis' => $analysis
    ]);
    }

    protected function isLikelyArabic($text)
    {
        // More robust Arabic detection
        $arabicPattern = '/[\x{0600}-\x{06FF}]/u';
        return preg_match($arabicPattern, $text);
    }


 protected function analyzePdfAndFetchResponse($text, $isArabic)
{
    // Adjust model based on language detection
    $model = $isArabic ? 'gpt-3.5-turbo' : 'gpt-3.5-turbo'; // Example, adjust as needed
    $promptLanguage = $isArabic ? "Please analyze this text in Arabic." : "Please analyze this text in Arabic.";

    $response = OpenAI::chat()->create([
        'model' => $model,
        'messages' => [
            ['role' => 'user', 'content' => $promptLanguage . "\n\n" . $text],
        ],
     
    ]);

    // Handle the response...
    return $response['choices'][0]['message']['content'];
}

public function askQuestion(Request $request)
{
    $validated = $request->validate([
        'question' => 'required|string|max:255',
    ]);
    $question = $validated['question'];
    $pdfText = session('pdf_text'); // Retrieve stored text

    $prompt = "Document: " . $pdfText . "\n\n" . "Question: " . $question;

    $response = OpenAI::chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'system', 'content' => 'You are an assistant that answers questions about a specific document. You should respond in Arabic.'],
            ['role' => 'user', 'content' => $prompt],
        ],
    ]);

    $answer = $response['choices'][0]['message']['content'];

    // Check if the answer indicates the model doesn't know
    if (strpos(strtolower($answer), "i don't know") !== false) {
        $answer = "يرجى طرح سؤال حول الوثيقة.";
    }

    return response()->json(['question' => $question, 'answer' => $answer]);
}
    public function show(Pdfai $pdfai)
    {
        $filePath = str_replace('public', 'storage', $pdfai->file_path);
        return view('pdf.show', ['filePath' => $filePath]);
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
