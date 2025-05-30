<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return redirect()->intended(route('login.index'));
    }


    public function login(Request $request){
         $validation = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $userCheck = User::where('email', $validation['email'])->first();

        if($userCheck){
            if(Hash::check($validation['password'], $userCheck->password)){
                Auth::login($userCheck);
                return response()->json([
                    'message' => 'Login successful',
                    'redirect_url' => route('dashboard.index')
                ], 200);
            }else{
                return response()->json([
                    'message' => 'Password is incorrect'
                ]);
            }
        }else{
            return response()->json([
                'message' => 'User not found'
            ]);
        }


    }
}
