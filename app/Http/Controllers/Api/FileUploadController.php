<?php
namespace App\Http\Controllers\Api;

use App\Models\Pdfai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function uploadPdf(Request $request)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // No validation for file_path anymore
        // Store the file
        $file = $request->file('file_path'); // Change this to match the incoming field
        if (!$file) {
            return response()->json(['message' => 'No file provided'], 400);
        }
        
        $filePath = $file->store('uploads', 'public');
        $originalName = $file->getClientOriginalName();
        $slug = Str::slug(pathinfo($originalName, PATHINFO_FILENAME));

        // Ensure the slug is unique
        $originalSlug = $slug;
        $counter = 1;
        while (Pdfai::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Save file details in the database
        $uploadedFile = new Pdfai();
        $uploadedFile->slug = $slug;
        $uploadedFile->original_name = $originalName;
        $uploadedFile->file_path = $filePath;
        $uploadedFile->user_id = $request->user()->id;

        $uploadedFile->save();

        return response()->json(['message' => 'File uploaded successfully']);
    }
}
