<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_admin()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }else{
            return view('panel.pages.login');
        }
    }

    public function authenticate_admin(Request $request)
    {
        $credentials = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::check()) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }else{
                return redirect()->intended('/');
            }
        }
        return back()->with('loginError', 'Wrong username or password, please try again!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
