<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use DB;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function all_notf_count()
    {

       
        $user_count = DB::table('notifications')->where('type','App\Notifications\UserCreatedAdmin')->count();
        $order_count = DB::table('notifications')->where('type','App\Notifications\newOrderCreated')->count();
        $product_count = DB::table('notifications')->where('type','App\Notifications\productCreatedAdmin')->count();




        $data = array();        
        $data['user_count'] = $user_count;
        $data['order_count'] = $order_count;
        $data['product_count'] = $product_count;

        return response()->json($data);            
    } 


    public function user_notf_clear()
    {
        // $data = Notification::where('user_id','!=',null);
        // $data->delete();        
    } 

    public function user_notf_show()
    {
        $datas = DB::table('notifications')->where('type','App\Notifications\UserCreatedAdmin')->latest()->get();
        // $datas = Notifications::where('');
        // if($datas->count() > 0){
        //   foreach($datas as $data){
        //     $data->is_read = 1;
        //     $data->update();
        //   }
        // }       
        return view('admin.notification.register',compact('datas'));           
    } 


    public function order_notf_clear()
    {
        // $data = Notification::where('order_id','!=',null);
        // $data->delete();        
    } 

    public function order_notf_show()
    {
       
      $datas = DB::table('notifications')->where('type','App\Notifications\newOrderCreated')->latest()->get();

        return view('admin.notification.order',compact('datas'));           
    } 


    public function product_notf_clear()
    {
        // $data = Notification::where('product_id','!=',null);
        // $data->delete();        
    } 

    public function product_notf_show()
    {
      $datas = DB::table('notifications')->where('type','App\Notifications\productCreatedAdmin')->latest()->get();     

      
        return view('admin.notification.product',compact('datas'));           
    } 


   

}