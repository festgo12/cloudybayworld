<?php

namespace App\Http\Controllers\Product;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\newOrderCreated;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    
    public function paycancle(){
        //cancel the checkout payment

        return redirect()->route('front.checkout')->with('unsuccess','Payment Cancelled.');
     }

    
    
     public function payreturn(){
         //return success payment
      

        if(Session::has('temporder_id')){
            $order_id = Session::get('temporder_id');
            $order = Order::find($order_id);
            $tempcart = unserialize(bzdecompress(utf8_decode($order['cart'])));
        }
        else{
            $tempcart = '';
            return redirect()->back();
        }
        // $user = User::where('id', Auth::user()->id);
        $user = auth()->user();
        // $user->notify( new newOrderCreated($tempcart, $order));

        Notification::send($user, new newOrderCreated($tempcart, $order));

        
       
        // dd($tempcart, $order);

        //  return view('product.order.success');
         return view('product.order.success',compact('tempcart','order'));
     }



}
