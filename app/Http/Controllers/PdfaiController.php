<?php

namespace App\Http\Controllers;

use App\Models\Pdfai;
use Spatie\PdfToText\Pdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

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
            'slug' => Str::slug($originalName),
            'original_name' => $originalName,
            'file_path' => $filePath,
            'user_id' => $user->id, 
        ]);
        
        // $text = (new \Spatie\PdfToText\Pdf('C:\\Program Files\\poppler-24.02.0\\Library\\bin\\pdftotext.exe'))
        $binPath = '/opt/homebrew/bin/pdftotext';
        $text = (new Pdf($binPath))
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
        'max_tokens' => 500, // Adjust as necessary
    ]);

    // Handle the response...
    return $response['choices'][0]['message']['content'];
}


    public function askQuestion(Request $request)
    {
        $question = $request->input('question');
        $pdfText = session('pdf_text'); // Retrieve stored text
        
        $prompt = $pdfText . "\n\n" . "Question: " . $question;
        
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);
        
        $answer = $response['choices'][0]['message']['content'];
        
        return response()->json(['question' => $question, 'answer' => $answer]);
    }


    public function show(Pdfai $pdf)
{
    // $pathToFile = storage_path('app/'.$pdf->file_path);
    dd('test');
     return view('pdf.show');
}
}
