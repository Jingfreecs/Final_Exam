<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed:password_confirmation',
            'password_confirmation' => 'required|same:password|min:8'
        ], [
            'name.required' => 'Fullname is required',
            'password_confirmation.required' => 'Re-type password is reqired',
        ]);

        $passwordHashed = bcrypt($validation['password']);

        $user = User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => $passwordHashed
        ]);

        if(!$user){
            return response()->json([
                'message' => 'Failed to create account, please try again later.'
            ], 500);
        }

        return response()->json([
            'message' => 'Account created successfully.',
            'redirect_url' => route('login.index')
        ]);
    }
}
