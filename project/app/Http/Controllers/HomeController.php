<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Follow;
use App\Models\Product;
use App\Models\Category;
use App\Models\ChMessage;
use App\Models\ShopFollow;
use App\Models\ShopCategory;
use App\Models\ShopFavorite;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!($user= auth()->user())) {
            
            return view('landing');
        }

        
        $products = Product::where('status', 1)->take(6)->get();
        $newProducts = Product::where('status', 1)->orWhere('latest', 1)->latest()->take(9)->get();
        $cats = Category::where('is_featured', 1)->take(5)->get();

        // $user = User::where('id', 29)->first();
       

        // // $followers = Follow::where('following_user_id',29)->get()->pluck('user_id');
        // $shopfollows = ShopFollow::where('shop_id',4)->get()->pluck('user_id');
        // $users = User::whereIn('id', $shopfollows)->get();

        // // $follows = Follow::where('following_user_id',$feed->feedable_id)->get();

        // $user = auth()->user();
        $shop = Shop::where('id', 2)->get();
        $user = User::where('id', $shop->user_id)->first();
                // $user = $shop->owner;
         dd( $shop, $user);

      
        

        return view('home', compact('products','cats', 'newProducts'));
    }


    public function darkmode($mode)
    {
        $user = auth()->user();
        $user->dark_mode = $mode ;
        if($user->save()){
            return $mode;
        }
        return ;

    }

    public function min_msg(){
        $user = auth()->user();

       

        $msgs = ChMessage::where('to_id', $user->id)->where('from_id', '!=', $user->id)->latest()->get()->unique('from_id')->take(3);
        $msgs->unread = 0;
        $unread = (new ChMessage)->countUnreadMessages();
        foreach($msgs as $msg){
            $msg->userName = $msg->user->firstname;
            $msg->userImage = $msg->user->avatar;
            $msg->time = $msg->created_at->diffForHumans();
        }
        $data = [
            'msgs' => $msgs,
            'unreadCount' => $unread
        ];

        // dd($data);
        return response()->json($data);
        // return $data;
    }

    public function noti(){
        $user = auth()->user();
        
        // $notifications =$user->unreadNotifications;
        // $activities =$user->notifications;
        
        $notifications = $user->unreadNotifications;
        $notiCount = $user->unreadNotifications->count();
        
        foreach($notifications as $noti){
            if(isset($noti->data['user_id'])){

                $puser = User::where('id', $noti->data['user_id'])->get();
                $noti->puser = $puser; 
            }
            
            if(isset($noti->data->shop_id)){

                $shop = Shop::where('id', $noti->data['shop_id'])->get();
                // $puser = $shop->user;
                $noti->$shop = $shop; 
            }
            $noti->userName = $user->firstname;
            $noti->userImage = $user->avatar;
            $noti->time = $noti->created_at->diffForHumans();
        }

        
        $data = [
            'notis' => $notifications,
            'notiCount' => $notiCount,
        ];

        // dd($data);
        return response()->json($data);
        // return $data;
    }

    public function config(Request $request)
    {
        
        $gs = Generalsetting::where('id', 1)->first()->tojson();
        $wsconfig = [
            'key' => config('chat.pusher.key'),
            'cluster' => config('chat.pusher.options.cluster'),
            'authEndpoint' => route("pusher.auth"),
        ];

        // dd($wsconfig, $gs);

            return ['wsconfig' => $wsconfig, 'gs' => $gs];
    
        
    }

    public function markasread(Request $request)
    {
        $user = auth()->user();

        $user->unreadNotifications->markAsRead();

            return redirect()->back();
    
        
    }
}
