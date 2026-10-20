<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cartitem;
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

        $userexist = User::where('email', $request->email)->first();
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($userexist) {
            if ($user) {
                Auth::login($user);
                return redirect()->route('Home');
            } else {
                return redirect()->route('Home.Auth.FormLogin')->with('error', 'email or password is false');
            }
        } else {
            return redirect()->route('Home.Auth.FormRegister')->with('error', 'YOU ARE NOT REGISTERED PLEASE FIRST SIGN UP');
        }
    }

    public function ShowUser()
    {
        if (Auth::check()) {
            dd(Auth::user()->password);
        }
    }

    // public function AddToCart($id, Request $request)
    // {
    //     if (Auth::check()) {
    //         $dataform['product_id'] = $id;
    //         $dataform['user_id'] = Auth::id();
    //         Cartitem::create($dataform);
    //         return redirect()->route('Home');
    //     } else {
    //         return redirect()->route('Home.Auth.FormLogin')->with('error', 'first log in !!!');
    //     }
    // }

    public function AddToCart($id, Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('Home.Auth.FormLogin')->with('error','first log in !!!');
        }

        $cartitem = Cartitem::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($cartitem) {
            $cartitem->increment('quantity');
        } else {
            Cartitem::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('Home');
    }

    public function Cart()
    {
        if (Auth::check()) {
            // $cartitems = Cartitem::where('id_user', Auth::id())->get();
            $cartitems = Cartitem::where('user_id', Auth::id())
                ->with('product')
                ->get();
            return view('Admin.auth.cart', compact('cartitems'));
        } else {
            return redirect()->route('Home.Auth.FormLogin');
        }
    }

    public function DeleteCartitem($id)
    {
        $cartitem = Cartitem::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $cartitem->delete();

        return redirect()->back();
    }
}
