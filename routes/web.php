<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfaiController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// pdfai routes
// pdf
Route::get('/upload', [PdfaiController::class, 'index'])->name('pdf.index');
Route::get('/create', [PdfaiController::class, 'create'])->name('pdf.create');
Route::post('/upload', [PdfaiController::class, 'store'])->name('pdf.store');
Route::get('/pdfs/{pdf}', [PdfaiController::class, 'show'])->name('pdf.show');
Route::post('/ask-question', [PdfaiController::class, 'askQuestion'])->name('ask.question');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
