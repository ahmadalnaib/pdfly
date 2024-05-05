<?php

namespace App\Http\Controllers\Api;

use App\Models\Pdfai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    //
    public function uploadPdf(Request $request)
    {

        $user = $request->user();
// Check if the user is authenticated
    if (!$user) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
        $request->validate([
            'pdf_file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $file = $request->file('pdf_file');
        $originalName = $file->getClientOriginalName();
        $filePath = $file->store('public/pdfs');
        
        $pdfFile = Pdfai::create([
            'slug' => Str::slug($originalName) . '-' . time(),
            'original_name' => $originalName,
            'file_path' => $filePath,
            'user_id' => $user->id, 
        ]);

        return response()->json([
            'id' => $pdfFile->id, // Return the ID of the uploaded file
            'original_name' => $pdfFile->original_name,
            'path' => $pdfFile->file_path
        ], 201);
    }
}
