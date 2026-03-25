<?php

namespace App\Http\Controllers\V1\Admin\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException; 
use ResetPasswordController;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $username = $request->username; 
        $password = $request->password; 
        $device_name = $request->device_name; 

        $user = User::where('email', $username)->first(); 

        if(!$user || !Hash::check($password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]); 
        }
        
        return response()->json([
            'type' => 'Bearer', 
            'token' => $user->createToken($device_name)->plainTextToken, 
        ]); 
    }

    public function logout(Request $request){
        $user = $request->user(); 

        $user->currentAccessToken()->delete(); 

        return response()->json([
            'success' => true
        ]); 
    }
}
