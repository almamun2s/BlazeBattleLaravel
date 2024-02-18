<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Showing user the login form
    public function login()
    {
        return view('user.login');
    }

    // Showing user the registration form
    public function register()
    {
        return view('user.register');
    }
    public function register_user(Request $request)
    {
        $formField = $request->validate([
            'fname' => ['required', 'min:3'],
            'lname' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash password
        $formField['password'] = bcrypt($formField['password']);
        // Create user
        $user = User::create($formField);

        // Login user 
        auth()->login($user);

        return redirect('/profile');
    }

    // Showing user the registration form
    public function profile()
    {
        return view('user.profile');
    }
}