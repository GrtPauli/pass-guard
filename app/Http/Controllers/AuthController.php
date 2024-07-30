<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller {
    // Show register page
    public function registerPage() {
        return view('auth.register');
    }

    // Show login page
    public function loginPage() {
        return view('auth.login');
    }

    // Register user
    public function register(Request $request){
        $formFields = $request->validate([
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        
        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/dashboard')->with('message', 'User created and logged in');
    }

    // login user
    public function login(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/dashboard')->with('message', 'You are now logged in');
        }

        return back()->withErrors([
            'password' => 'Invalid Credentials'
        ])->onlyInput('email');
    }

    // Logout user 
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out');
    }
}