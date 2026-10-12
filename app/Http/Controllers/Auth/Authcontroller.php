<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Authcontroller extends Controller
{
    public function FormRegister()
    {
        return view('Auth.Register');
    }

    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);
        $emailuser = User::where('email', $request->email)->first();
        if ($emailuser == null) {
            $dataform = $request->all();
            $user = User::create($dataform);
            Auth::login($user);
            return redirect()->route('Home');
        } else {
            return redirect()->route('Home.Auth.FormRegister')->with('error', "email is exists");
        };
    }

    public function FormLogin()
    {
        return view('Auth.login');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('Home');
        } else {
            return redirect()->route('Home.Auth.FormLogin')->with('error', 'email or password is false');
        }
    }

    public function ShowUser(){
        if (Auth::check()){
            dd(Auth::user()->password);
        }
    }
}
