<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
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
}
}
