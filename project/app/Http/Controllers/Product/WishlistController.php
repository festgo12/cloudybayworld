<?php

namespace App\Http\Controllers\Product;

use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Notifications\addWishlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function wishlists(Request $request)
    {
        $sort = '';
        $user = Auth::guard('web')->user();

       


        $wishlists = Wishlist::where('user_id','=',$user->id)->with(['product'])->whereHas('product', function($query) {
            $query->where('status', '=', 1);
         })->get();
        //  dd($wishlists);
         
        return view('product.wishlist',compact('user','wishlists','sort'));
    }

    public function addwish($id)
    {
        $user = Auth::guard('web')->user();
        $data[0] = 0;
        $ck = Wishlist::where('user_id','=',$user->id)->where('product_id','=',$id)->get()->count();
        if($ck > 0)
        {
            return response()->json($data);
        }
        $wish = new Wishlist();
        $wish->user_id = $user->id;
        $wish->product_id = $id;
        $wish->save();

        $product = Product::where('id', $id)->first();
        // notify the user
        $user = User::where('id', $user->id)->first();
        $user->notify(new addWishlist($product));


        $data[0] = 1;
        $data[1] = count($user->wishlists);
        return response()->json($data);
    }

    public function removewish($id)
    {
        $user = Auth::guard('web')->user();
        $wish = Wishlist::findOrFail($id);
        $wish->delete();
        $data[0] = 1;
        $data[1] = count($user->wishlists);
        return response()->json($data);
    }
}
