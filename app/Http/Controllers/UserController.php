<?php

namespace App\Http\Controllers;

use App\Models\Team;
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
        if (isset($_GET['id'])) {
            // dd($_GET['id']);
            $userId = $_GET['id'];
            return view(
                'user.otherProfile',
                [
                    'tab'   => 'tournament',
                    'team'  => Team::find(User::findOrFail($userId)->teams_id),
                    'user'  => User::find($userId)
                ]
            );
        }
        return view(
            'user.profile',
            [
                'tab'   => 'dashboard',
                'team'  => Team::find(User::findOrFail(auth()->id())->teams_id)
            ]
        );
    }

    // Showing user Profile
    public function profileTab( $tab )
    {
        return view(
            'user.profile',
            [
                'tab'   => $tab,
                'team'  => Team::find(User::findOrFail(auth()->id())->teams_id)
            ]
        );
    }

    public function profile_edit(Request $request){
        $formField = $request->validate([
            'fname' => ['required', 'min:3'],
            'lname' => ['required', 'min:3'],
            'ff_id' => ['required', Rule::unique('users', 'ff_id')]
        ]);
        User::where('id', auth()->id())->update($formField);

        return back()->with('message', 'Profile updated Successfully.');
    }
}