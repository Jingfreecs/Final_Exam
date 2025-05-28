<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->route('login.index');
        }
    }
}
