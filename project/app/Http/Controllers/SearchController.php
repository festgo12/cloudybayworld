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
        $page = $request->get('page');
        
        // return empty array when query value is empty
        if (!$query && !$page) {
            return view('search', ['query' => $query, 'products' => [], 'shops' => [], 'people' => []]);
        }

        // fetch matched products
        $products = Product::where('name', 'like', '%' . $query . '%')->paginate(15);
        // fetch matched shops
        $shops = Shop::where('shopName', 'like', '%' . $query . '%')->paginate(15);

        // fetch matched users
        // search based on username if search query starts with @
        if (str_starts_with($query, '@')) {
            $people = User::where('username', 'like', '%' . substr($query,1) . '%')->paginate(15);
        }else{
            $people = User::where('firstname', 'like', '%' . $query . '%')->paginate(15);
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

    public function searchAutocomplete($query)
    {
        // fetch matched data
        if (str_starts_with($query, '@')) {
            $users = User::where('username', 'like', '%' . substr($query,1) . '%')->pluck('username')->toArray();
            $data = preg_filter('/^/', '@', $users);
        }else{
            $data = Product::where('name', 'like', '%' . $query . '%')->pluck('name');
        }
        
        return $data;
    }
}
