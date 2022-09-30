<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Feed;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');
        // redirect to home page value is entered to search
        if (!$query) {
            return redirect()->route('home');
        }

        // fetch matched products
        $products = Product::where('name', 'like', '%' . $query . '%')->get();
        // fetch matched shops
        $shops = Shop::where('shopName', 'like', '%' . $query . '%')->get();

        // fetch matched users
        // search based on username if search query starts with @
        if (str_starts_with($query, '@')) {
            $people = User::where('username', 'like', '%' . substr($query,1) . '%')->get();
        }else{
            $people = User::where('firstname', 'like', '%' . $query . '%')->get();
        }

        return view('search', ['query' => $query, 'products' => $products, 'shops' => $shops, 'people' => $people]);
    }

    public function searchFeed($query, $userId)
    {
        // fetch matched feeds
        $feeds = Feed::where('content', 'like', '%' . $query . '%')
            ->with('user')
            ->with('shop')
            ->with('likes')
            ->with([
            'isLikedBy' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }
        ])
            ->with([
            'comments' => function ($query) {
            $query->orderByDesc('id')->with('user');
        }
        ])
            ->withCount('comments as total_comments')
            ->orderByDesc('id')
            ->get();
        return $feeds;
    }
}
