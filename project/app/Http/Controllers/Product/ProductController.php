<?php

namespace App\Http\Controllers\Product;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Currency;
use App\Models\ProductClick;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //

     // -------------------------------- PRODUCT DETAILS SECTION ----------------------------------------
 
     public function product($slug)
     {

        $gs = Generalsetting::first();
         $productt = Product::where('slug','=',$slug)->firstOrFail();
         if($productt->status == 0){
           return response()->view('errors.404')->setStatusCode(404); 
         }
         $productt->views+=1;
         $productt->update();
         if (Session::has('currency'))
         {
             $curr = Currency::find(Session::get('currency'));
         }
         else
         {
             $curr = Currency::where('is_default','=',1)->first();
         }
         $product_click =  new ProductClick;
         $product_click->product_id = $productt->id;
         $product_click->date = Carbon::now()->format('Y-m-d');
         $product_click->save();
 
         if($productt->user_id != 0)
         {
             $vendors = Product::where('status','=',1)->where('user_id','=',$productt->user_id)->take(8)->get();
         }
         else
         {
             $vendors = Product::where('status','=',1)->where('user_id','=',0)->take(8)->get();
         }
         return view('front.product.details',compact('productt','curr','gs','vendors'));
 
     }



    // -------------------------------- PRODUCT DETAILS SECTION ENDS----------------------------------------





// ------------------ Rating SECTION --------------------

public function reviewsubmit(Request $request)
{
 $ck = 0;
 $orders = Order::where('user_id','=',$request->user_id)->where('status','=','completed')->get();

 foreach($orders as $order)
 {
 $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
     foreach($cart->items as $product)
     {
         if($request->product_id == $product['item']['id'])
         {
             $ck = 1;
             break;
         }
     }
 }
 if($ck == 1)
 {
     $user = Auth::guard('web')->user();
     $prev = Rating::where('product_id','=',$request->product_id)->where('user_id','=',$user->id)->get();
     if(count($prev) > 0)
     {
     return response()->json(array('errors' => [ 0 => 'You Have Reviewed Already.' ]));
     }
     $Rating = new Rating;
     $Rating->fill($request->all());
     $Rating['review_date'] = date('Y-m-d H:i:s');
     $Rating->save();
     $data[0] = 'Your Rating Submitted Successfully.';
     $data[1] = Rating::rating($request->product_id);
     return response()->json($data);
 }
 else{
     return response()->json(array('errors' => [ 0 => 'Buy This Product First' ]));
 }
}


public function reviews($id){
 $productt = Product::find($id);
 return view('load.reviews',compact('productt','id'));

}

// ------------------ Rating SECTION ENDS --------------------


}
