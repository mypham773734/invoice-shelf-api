<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory; 
    
    protected $fillable = ['option', 'value'];

    public static function getSetting(string $key){
        $setting = self::whereOption($key)->first(); 
        
        if($setting){
            return $setting->value; 
        }else{
            return null; 
        }
    }

    public static function setSetting(string $key, string $value){
        return self::updateOrCreate(
            [
                'option' => $key,
            ], 
            [
                'option' => $key, 
                'value' => $value
            ]
        ); 
    }
}
