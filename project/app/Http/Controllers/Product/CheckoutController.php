<?php

namespace App\Http\Controllers\Product;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Pickup;
use App\Models\Product;
use App\Models\Currency;
use App\Models\OrderTrack;
use App\Models\VendorOrder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Notification;

class CheckoutController extends Controller
{
    
    public function checkout()
    {
        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success',"You don't have any product to checkout.");
        }
        $gs = Generalsetting::findOrFail(1);
        $dp = 1;
        $vendor_shipping_id = 0;
        $vendor_packing_id = 0;
            if (Session::has('currency')) 
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }

        // If a user is Authenticated then there is no problm user can go for checkout

        if(Auth::guard('web')->check())
        {
                $pickups = Pickup::all();
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $products = $cart->items;

                // Shipping Method

                if($gs->multiple_shipping == 1)
                {                        
                    $user = null;
                    foreach ($cart->items as $prod) {
                            $user[] = $prod['item']['user_id'];
                    }
                    $users = array_unique($user);
                    if(count($users) == 1)
                    {

                        $shipping_data  = DB::table('shippings')->where('user_id','=',$users[0])->get();
                        if(count($shipping_data) == 0){
                            $shipping_data  = DB::table('shippings')->where('user_id','=',0)->get();
                        }
                        else{
                            $vendor_shipping_id = $users[0];
                        }
                    }
                    else {
                        $shipping_data  = DB::table('shippings')->where('user_id','=',0)->get();
                    }

                }
                else{
                $shipping_data  = DB::table('shippings')->where('user_id','=',0)->get();
                }



                foreach ($products as $prod) {
                    if($prod['item']['type'] == 'Physical')
                    {
                        $dp = 0;
                        break;
                    }
                }
                if($dp == 1)
                {
                $ship  = 0;                    
                }
                $total = $cart->totalPrice;
                $coupon = Session::has('coupon') ? Session::get('coupon') : 0;
                if($gs->tax != 0)
                {
                    $tax = ($total / 100) * $gs->tax;
                    $total = $total + $tax;
                }
                if(!Session::has('coupon_total'))
                {
                $total = $total - $coupon;     
                $total = $total + 0;               
                }
                else {
                $total = Session::get('coupon_total');  
                $total = $total + round(0 * $curr->value, 2); 
                }


        return view('front.product.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'shipping_cost' => 0, 'digital' => $dp, 'curr' => $curr,'shipping_data' => $shipping_data, 'vendor_shipping_id' => $vendor_shipping_id, 'vendor_packing_id' => $vendor_packing_id]);             
        }

        

    }




    public function cashondelivery(Request $request)
    {
      
        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success',"You don't have any product to checkout.");
        }
            if (Session::has('currency')) 
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
        $gs = Generalsetting::findOrFail(1);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        foreach($cart->items as $key => $prod)
        {
        if(!empty($prod['item']['license']) && !empty($prod['item']['license_qty']))
        {
                foreach($prod['item']['license_qty']as $ttl => $dtl)
                {
                    if($dtl != 0)
                    {
                        $dtl--;
                        $produc = Product::findOrFail($prod['item']['id']);
                        $temp = $produc->license_qty;
                        $temp[$ttl] = $dtl;
                        $final = implode(',', $temp);
                        $produc->license_qty = $final;
                        $produc->update();
                        $temp =  $produc->license;
                        $license = $temp[$ttl];
                         $oldCart = Session::has('cart') ? Session::get('cart') : null;
                         $cart = new Cart($oldCart);
                         $cart->updateLicense($prod['item']['id'],$license);  
                         Session::put('cart',$cart);
                        break;
                    }                    
                }
        }
        }
        $order = new Order;
        $success_url = action('Product\PaymentController@payreturn');
        $item_name = "CloudBay World Order";
        $item_number = Str::random(10);
        $order['user_id'] = $request->user_id;
        $order['cart'] = utf8_encode(bzcompress(serialize($cart), 9)); 
        $order['totalQty'] = $request->totalQty;
        $order['pay_amount'] = round($request->total / $curr->value, 2);
        $order['method'] = $request->method;
        $order['shipping'] = $request->shipping;
        $order['pickup_location'] = $request->pickup_location;
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;
        $order['shipping_cost'] = $request->shipping_cost;
        // $order['packing_cost'] = $request->packing_cost;
        $order['tax'] = $request->tax;
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = Str::random(10);
        $order['customer_address'] = $request->address;
        $order['customer_country'] = $request->customer_country;
        $order['customer_city'] = $request->city;
        $order['customer_zip'] = $request->zip;
        $order['shipping_email'] = $request->shipping_email;
        $order['shipping_name'] = $request->shipping_name;
        $order['shipping_phone'] = $request->shipping_phone;
        $order['shipping_address'] = $request->shipping_address;
        $order['shipping_country'] = $request->shipping_country;
        $order['shipping_city'] = $request->shipping_city;
        $order['shipping_zip'] = $request->shipping_zip;
        $order['order_note'] = $request->order_notes;
        $order['coupon_code'] = $request->coupon_code;
        $order['coupon_discount'] = $request->coupon_discount;
        $order['dp'] = $request->dp;
        $order['payment_status'] = "Pending";
        // $order['currency_sign'] = $curr->sign;
        // $order['currency_value'] = $curr->value;
        $order['vendor_shipping_id'] = $request->vendor_shipping_id;
        // $order['vendor_packing_id'] = $request->vendor_packing_id;

        
        $order->save();

        $track = new OrderTrack;
        $track->title = 'Pending';
        $track->text = 'You have successfully placed your order.';
        $track->order_id = $order->id;
        $track->save();

                    if($request->coupon_id != "")
                    {
                       $coupon = Coupon::findOrFail($request->coupon_id);
                       $coupon->used++;
                       if($coupon->times != null)
                       {
                            $i = (int)$coupon->times;
                            $i--;
                            $coupon->times = (string)$i;
                       }
                        $coupon->update();

                    }

        foreach($cart->items as $prod)
        {
            $x = (string)$prod['size_qty'];
            if(!empty($x))
            {
                $product = Product::findOrFail($prod['item']['id']);
                $x = (int)$x;
                $x = $x - $prod['qty'];
                $temp = $product->size_qty;
                $temp[$prod['size_key']] = $x;
                $temp1 = implode(',', $temp);
                $product->size_qty =  $temp1;
                $product->update();               
            }
        }


        foreach($cart->items as $prod)
        {
            $x = (string)$prod['stock'];
            if($x != null)
            {

                $product = Product::findOrFail($prod['item']['id']);
                $product->stock =  $prod['stock'];
                $product->update();  
                            
            }
        }

        $notf = null;

        foreach($cart->items as $prod)
        {
            if($prod['item']['user_id'] != 0)
            {
                $vorder =  new VendorOrder;
                $vorder->order_id = $order->id;
                $vorder->user_id = $prod['item']['user_id'];
                $notf[] = $prod['item']['user_id'];
                $vorder->qty = $prod['qty'];
                $vorder->price = $prod['price'];
                $vorder->order_number = $order->order_number;             
                $vorder->save();
            }

        }

        // check notifiable users
        if(!empty($notf))
        {
            $users = array_unique($notf);
            foreach ($users as $user) {
                // Notify Vendor users


               
            }
        }

        Session::put('temporder_id',$order->id);
        Session::put('tempcart',$cart);

        Session::forget('cart');

            Session::forget('already');
            Session::forget('coupon');
            Session::forget('coupon_total');
            Session::forget('coupon_total1');
            Session::forget('coupon_percentage');



        //Sending Email To Buyer

      
        // redirect to payment.return Route

        return redirect($success_url);
    }
}
