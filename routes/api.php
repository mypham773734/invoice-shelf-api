<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppVersionController; 
use App\Http\Controllers\V1\Admin\Mobile\AuthController; 
use App\Http\Controllers\V1\Admin\Auth\ResetPasswordController; 
use App\Http\Controllers\V1\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\V1\Admin\General\BootstrapController; 
use App\Http\Controllers\V1\Admin\Settings\CompanyController; 

// Ping 
Route::get('/ping', function(){
    return response()->json([
        'success' => 'invoice shelf api success'
    ]); 
}); 

Route::prefix('v1')->group(function(){
    // App version 
    // ---------------------------
    Route::get('app/version', AppVersionController::class); 

    // Authentication & Password Reset
    Route::prefix('auth')->group(function(){
        Route::get('login', function(){
            echo "route login"; 
        })->name('login'); 

        Route::post('login', [AuthController::class, 'login']); 

        Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum'); 

        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']); 

        // Handle reset password form process
        Route::post('reset/password', [ResetPasswordController::class, 'reset']); 
    }); 

    Route::middleware('auth:sanctum')->group(function(){
        Route::get('/bootstrap', [BootstrapController::class, 'index']);



        // Settings
        // ----------------------------------
        Route::get('/me', [CompanyController::class, 'getUser']); 

        Route::put('/me', [CompanyController::class, 'updateProfile']); 
    }); 

    
}); 

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
