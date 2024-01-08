<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('Auth.registration');
    }

    public function store(Request $request){
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = \App\Models\User::createUser(
            $request->name,
            $request->email,
            $request->password
        );

        auth()->login($user);

        return redirect()->route('home');
    }
}
