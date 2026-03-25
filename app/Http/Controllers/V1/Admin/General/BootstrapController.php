<?php

namespace App\Http\Controllers\V1\Admin\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource; 
use App\Trait\GeneratesMenuTrait; 

class BootstrapController extends Controller
{
    use GeneratesMenuTrait; 

    public function index(Request $request){
        $currentUser = $request->user(); 
        $currentUserSettings = $currentUser->getAllSettings(); 
        
        $mainMenu = $this->getMenu('main_menu', $currentUser); 
        $settingMenu = $this->getMenu('setting_menu', $currentUser);
        
        
        return response()->json([
            'currrent_user' => new UserResource($currentUser),  
            'current_user_setting' => $currentUserSettings,  
            'current_user_abilities' => 'current_user',  
            'companies' => 'current_user',  
            'current_company' => 'current_user',  
            'current_company_setting' => 'current_user',  
            'current_company_currency' => 'current_user', 
            'config' => config('invoiceshelf'), 
            'global_setting' => 'current_user', 
            'main_menu' => $mainMenu, 
            'setting_menu' => $settingMenu, 
            'modules' => 'module', 
        ]); 
    }
}
