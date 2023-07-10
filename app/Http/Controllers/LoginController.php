<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('site.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = \DB::table('users')
            ->where('email', $request->input('email'))
            ->where('password', md5($request->input('password')))
            ->first();
        if ($user) {
            session()->put('user', $user);
            return redirect('/');
        }

        return redirect('/home/login')->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
    }
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
