<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Shop;
use App\Models\User;
use App\Models\Follow;
use App\Models\Product;
use App\Models\Category;
use App\Models\ChMessage;
use App\Models\ShopFollow;
use App\Models\ProductClick;
use App\Models\ShopCategory;
use App\Models\ShopFavorite;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\StoryView;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if (!($user = auth()->user())) {

            return view('landing');
        }


        $products = Product::where('status', 1)->take(6)->get();
        $newProducts = Product::where('status', 1)->orWhere('latest', 1)->latest()->take(9)->get();
        $cats = Category::where('is_featured', 1)->take(5)->get();


        $expDate = Carbon::now()->subDays(30);
        $prodclks = ProductClick::whereDate('date', '>', $expDate)->get()->groupBy('product_id');

        foreach ($prodclks as $prodtt) {

            $prodtt->prodcount = $prodtt->count('product_id');
            foreach ($prodtt as $prod) {
                $prodName = $prod->product->name;
                $prodSlug = $prod->product->slug;
                $prodCat = $prod->product->category->name;

            }
            $prodtt->prodName = $prodName;
            $prodtt->prodCat = $prodCat;
        }

        $trending = $prodclks->sortByDesc('prodcount')->groupBy('prodCat');


        $blogBonanzaCategories = BlogCategory::where('name', 'like', '%' . 'Bonanza' . '%')->get();
        $bonanzaBlogList = Blog::whereIn('shop_id', $user->shopFollowing->pluck('id'))
            ->whereIn('category_id', $blogBonanzaCategories->pluck('id'))
            ->orderByDesc('id')
            ->get();

        // get all shops followed by current user
        $shopsForStories = Shop::whereIn('id', $user->shopFollowing->pluck('id'))->get();
        // get current user views
        $storyViews = StoryView::where('user_id', $user->id)->get();

        return view('home', compact('products', 'cats', 'newProducts', 'trending', 'bonanzaBlogList', 'shopsForStories', 'storyViews'));

    }


    public function get_time_ago($time)    {
        $time_difference = time() - $time;

        if ($time_difference < 1) {
            return '1s';
        }
        $condition = array(12 * 30 * 24 * 60 * 60 => 'y',
            30 * 24 * 60 * 60 => 'm',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hr',
            60 => 'min',
            1 => 's'
        );

        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;

            if ($d >= 1) {
                $t = round($d);
                return $t . '' . $str . ($t > 1 ? 's' : '');
            }
        }    
    }


    public function darkmode($mode)
    {
        $user = auth()->user();
        $user->dark_mode = $mode;
        if ($user->save()) {
            return $mode;
        }
        return;

    }


    public function seller()
    {
        $user = auth()->user();

        if ($user->is_vendor && $user->shop) {
            return redirect()->back()->with('msg', 'You are Already Vendor ');
        }

        return view('seller', compact('user'));

    }



    public function min_msg()
    {

        $user = auth()->user();



        $msgs = ChMessage::where('to_id', $user->id)->where('from_id', '!=', $user->id)->latest()->get()->unique('from_id')->take(3);
        $msgs->unread = 0;
        $unread = (new ChMessage)->countUnreadMessages();
        foreach ($msgs as $msg) {
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

    }

    public function noti()
    {
        $user = auth()->user();



        $notifications = $user->unreadNotifications;
        $notiCount = $user->unreadNotifications->count();

        foreach ($notifications as $noti) {
            if (isset($noti->data['user_id'])) {

                $puser = User::where('id', $noti->data['user_id'])->get();
                $noti->puser = $puser;
            }

            if (isset($noti->data->shop_id)) {

                $shop = Shop::where('id', $noti->data['shop_id'])->get();

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
