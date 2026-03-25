<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController; 
use App\Http\Controllers\V1\Install\OnboardingWizardController;



Route::prefix('v1')->group(function () {
    
    // Countries
    // ---------------------------------------
    Route::get('countries', [CountryController::class, 'index']);

    // Onboarding
    // ---------------------------------------
    Route::prefix('installation')->group(function(){
        Route::get('/wizard-step', [OnboardingWizardController::class, 'getStep']); 
    });
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
