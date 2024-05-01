<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfaiController;
use Illuminate\Validation\ValidationException;

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

Route::post('/login', function (Request $request) {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => ''
    ]);

    $user=User::where('email', $request->email)->first();
    if(!$user || !Hash::check($request->password, $user->password)){
       throw ValidationException::withMessages([
           'email' => ['The provided credentials are incorrect.'],
       ]);
    }

    $deviceName = $request->device_name ?? 'mobile';
    $token = $user->createToken($deviceName)->plainTextToken;
    return response()->json(['token' => $token, 'user' => $user->only(['id', 'name', 'email'],201)]);


});


Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Logged out']);
});


Route::post('/register', function (Request $request) {

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    


});


// routes/api.php

Route::post('/pdfs', [PdfaiController::class, 'store'])->name('pdf.store');
Route::post('/pdfs/{pdfai}/questions', [PdfaiController::class, 'askQuestion'])->name('pdf.askQuestion');

