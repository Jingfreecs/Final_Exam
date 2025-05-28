<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthCortroller extends Controller
{
    public function showRegisterForm(){
        return view('register');

    }
}
