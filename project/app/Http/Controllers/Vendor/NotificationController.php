<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Models\UserNotification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function order_notf_count($id)
    {
        // $data = UserNotification::where('user_id','=',$id)->where('is_read','=',0)->get()->count();
         $data = DB::table('notifications')->where('type','App\Notifications\newOrderCreated')->count();

        return response()->json($data);            
    } 

    public function order_notf_clear($id)
    {
        // $data = UserNotification::where('user_id','=',$id);
        // $data->delete();        
    } 

    public function order_notf_show($id)
    {
        $datas = DB::table('notifications')->where('type','App\Notifications\newOrderCreated')->latest()->get();
        // if($datas->count() > 0){
        //   foreach($datas as $data){
        //     $data->is_read = 1;
        //     $data->update();
        //   }
        // }       
        return view('vendor.notification.order',compact('datas'));           
    } 
}
