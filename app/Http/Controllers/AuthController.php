<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('register.index');

    }
    public function register(Request $request){

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'mobile_number' => 'required|string|unique:users','mobile_number',
            'password' => 'required|string|min:6|confirmed',
        ]);

            $user = User::create([ //Crete new user
            'first_name' => $validated['first_name'],
            'surname' => $validated['surname'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'mobile_number' => $validated['mobile_number'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        return redirect()->route('dashboard.index')->with('success', 'You have successfully registered');
    }
}
