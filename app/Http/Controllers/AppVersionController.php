<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

use App\Models\Settings; 

class AppVersionController extends Controller
{
    public function __invoke()
    {
        $version = preg_replace('~[\r\n]+~', '', File::get(base_path('version.md')));

        $channel = Settings::getSetting('update_channel'); 

        if(is_null($channel)){
            $channel = 'stable'; 
            Settings::setSetting('update_channel', $channel); 
        }

        return response()->json([
            'version' => $version, 
            'channel' => $channel
        ]); 
    }
}