<?php

namespace App\Http\Controllers\V1\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource; 
use App\Http\Requests\ProfileRequest; 

class CompanyController extends Controller
{
    public function getUser(Request $request){
        return new UserResource($request->user()); 
    }

    public function updateProfile(ProfileRequest $request){
        $user = $request->user(); 
        $user->update($request->validated()); 

        return new UserResource($user); 
    }
}
