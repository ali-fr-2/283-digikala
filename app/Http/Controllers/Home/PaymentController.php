<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\order_item;
use Evryn\LaravelToman\CallbackRequest;
use Evryn\LaravelToman\Facades\Toman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // public function Payment(Request $request)
    // {
    //     if (Auth::check()) {
    //         $dataform = $request->all();
    //         $user = Auth::user();
    //         $dataform['user_id'] = $user->id;
    //         $finalprice = $user->cartitems->sum(function ($cartitem) {
    //             return $cartitem->product->price * $cartitem->quantity;
    //         });
    //         $dataform['price'] = $finalprice;
    //         $order = order::create($dataform);

    //         $orderitems = $user->cartitems->map(function ($cartitem) use ($order, $user) {
    //             return [
    //                 "user_id" => $user->id,
    //                 "product_id" => $cartitem->product->id,
    //                 "order_id" => $order->id
    //             ];
    //         });

    //         order_item::insert($orderitems->toArray());
    //     } else {
    //         return redirect()->route('Home.Auth.FormLogin')->with('error', 'log in first!!');
    //     }
    // }

    public function Payment(Request $request)
    {
        if (Auth::check()) {

            $user = Auth::user();

            $finalPrice = $user->cartitems->sum(function ($cartitem) {
                return $cartitem->product->price * $cartitem->quantity;
            });
            $order = Order::create([
                'user_id' => $user->id,
                'price' => $finalPrice
            ]);

            $orderitems = $user->cartitems->map(function ($cartitem) use ($order, $user) {
                return [
                    "user_id" => $user->id,
                    "product_id" => $cartitem->product->id,
                    "order_id" => $order->id,
                    'quantity' => $cartitem->quantity,
                    'price' => $cartitem->product->price,
                ];
            });

            order_item::insert($orderitems->toArray());


            $payment = Toman::amount($order->price)
                ->description('پرداخت سفارش دیجی‌کالا')
                ->callback(route('Home.CallBack'))
                ->request();


            $order->transactionId = $payment->transactionId();
            $order->save();


            if ($payment->successful()) {

                return $payment->pay();
            }
        } else {
            return redirect()->route('Home.Auth.FormLogin')->with('error', 'log in first!!');
        }
    }

    // CallbackRequest

    public function CallBack(CallbackRequest $request)
    {
        $order = Order::where('transactionId', $request->transactionid())->first();
        $payment = $request->amount($order->price)->verify();

        if ($payment->successful()) {
            $referenceId = $payment->referenceId();

            $order->update([
                'order_status' => 1,
                'referenceId' => $referenceId,
            ]);

            return redirect()->route('Home.PaymentSuccess');
        }

        if ($payment->alreadyVerified()) {
        }

        if ($payment->failed()) {
        }
    }

    public function PaymentSuccess()
    {
        // $user_id = Auth()->user()->id;
        $user_id = Auth::user()->id;
        $order = Order::where('user_id', $user_id)->latest()->first();

        return view('Auth.success', compact('order', 'user_id'));
    }
}
