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
    public function login_user(Request $request){
        $formField = $request->validate([
            'email' => ['required', 'email'],
            'password'  => 'required'
        ]);

        if (auth()->attempt($formField)) {
            $request->session()->regenerate();
            return redirect('/profile');
        }

        return back()->withErrors(['email' => 'Invalid requirements.'])->onlyInput('email');
    }
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
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

    // Showing user Profile
    public function profile()
    {
        return view(
            'user.profile',
            [
                'tab'   => 'dashboard'
            ]
        );
    }

    // Showing user Profile
    public function profileTab( $tab )
    {
        return view(
            'user.profile',
            [
                'tab'   => $tab
            ]
        );
    }
}