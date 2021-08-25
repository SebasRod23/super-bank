<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Logs the user out.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('homepage');
    }
    
    /**
     * Show the register page
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function register(Request $req)
    {
        return view('auth.register');
    }

    /**
     * Save the user
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function saveUser(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        Auth::login($user);

        return redirect()->route('homepage');
    }

    /**
     * Show the login page
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function login(Request $req)
    {
        return view('auth.login');
    }

    /**
     * Log in user
     * 
     * @param \App\Models\ModelClass
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();

            return redirect()->route('homepage');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
