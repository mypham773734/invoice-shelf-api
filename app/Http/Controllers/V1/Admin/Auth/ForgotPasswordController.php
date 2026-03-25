<?php

namespace App\Http\Controllers\V1\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails; 

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails; 
}
