<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PdfaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanCheckoutController;
use App\Http\Controllers\StripeWebhookController;

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
Route::get('/pdf/upload', [PdfaiController::class, 'index'])->name('pdf.index');
Route::get('/pdf/create', [PdfaiController::class, 'create'])->name('pdf.create');
Route::post('/pdf/upload', [PdfaiController::class, 'store'])->name('pdf.store');
Route::get('/pdf/{pdfai:slug}', [PdfaiController::class, 'show'])->name('pdf.show');
Route::post('/pdf/ask-question', [PdfaiController::class, 'askQuestion'])->name('ask.question');
Route::delete('/pdf/{doc:slug}', [PdfaiController::class, 'destroy'])->name('pdf.destroy');


// checkout
//checkout
Route::get('/plans', PlanController::class)->name('checkout');
Route::post('/{plan:slug}/checkout', PlanCheckoutController::class)->name('checkout.index');
Route::post('/stripe/webhook', StripeWebhookController::class)->name('stripe.webhook');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
