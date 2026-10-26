<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cartitem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart($id, Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('Home.Auth.FormLogin')->with('error', 'first log in !!!');
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
