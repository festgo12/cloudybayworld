<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\ChMessage;
use App\Models\ShopCategory;
use App\Models\ShopFavorite;
use Illuminate\Http\Request;

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

        // $user = User::find($user->id);
        // $shop = Shop::where('slug', '24fa0d181dc9a277ec9c234475d2d505c4e8c7ec')->first();

        // $da = $user->shopFollowing()->where('shop_id', $shop->id)->first();
        // $shF = ShopFavorite::where('user_id', $user->id)->where('shop_id', $shop->id)->exists();

        // dd($user,$shop->id, $da ,$shF);

        

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
        return $data;
    }
}
