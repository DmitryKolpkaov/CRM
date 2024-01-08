<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('name', 'email', 'password'))) {
            return back()->withErrors([
                'message' => 'Invalid login details',
            ]);
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
