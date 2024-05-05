<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfaiController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\FileUploadController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logut', [LogoutController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/send-message', [ChatController::class, 'sendMessageFromReactNative']);
Route::post('/upload-pdf', [FileUploadController::class, 'uploadPdf'])->middleware('auth:sanctum');
