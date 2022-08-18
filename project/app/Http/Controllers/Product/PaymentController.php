<?php

namespace App\Http\Controllers\Product;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    
    public function paycancle(){
        //cancel the checkout payment

        return redirect()->route('front.checkout')->with('unsuccess','Payment Cancelled.');
     }

    
    
     public function payreturn(){
         //return success payment
        //  dd($_GET);

        if(Session::has('temporder_id')){
            $order_id = Session::get('temporder_id');
            $order = Order::find($order_id);
            $tempcart = unserialize(bzdecompress(utf8_decode($order['cart'])));
        }
        else{
            $tempcart = '';
            return redirect()->back();
        }
        // dd($tempcart, $order);

        //  return view('front.product.order.success');
         return view('front.product.order.success',compact('tempcart','order'));
     }



}
