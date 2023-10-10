<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;


class LoginController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registeruser(Request $request){
        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'fullname' => $request->fullname,
            'remember_token' => Str::random(50),
            'is_active' => $request->is_active,
        ]);
        return redirect('/');
        
    }
    
    public function login(){
        return view('login');
    }

    public function loginproses(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
