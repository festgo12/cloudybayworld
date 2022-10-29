<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\ShopFollow;
use App\Models\ShopCategory;
use App\Models\ShopFavorite;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Notifications\favShop;
use App\Notifications\followShop;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function createShop()
    {
        return view('shop.newShop');
    }

    public function markets()
    {
        return view('shop.markets');
    }

    public function favorites()
    {
        return view('shop.favorites');
    }

    public function marketDetails($slug)
    {
        $shop = Shop::where('slug', $slug)->first();
        if ($shop) {
            return view('shop.marketDetails')->with('shop', $shop);
        }
        else {
            return view('404');
        }
    }

    public function marketfeeds($slug)
    {
        $shop = Shop::where('slug', $slug)->first();
        $blogCategories = BlogCategory::all();
        $blogList = Blog::where('shop_id', $shop->id)->orderByDesc('id')->get();
        if ($shop) {
            return view('shop.marketFeeds', ['shop' => $shop, 'blogCategories' => $blogCategories, 'blogList' => $blogList]);
        }
        else {
            return view('404');
        }
    }
    /**
     * Get all categories
     */
    public function categories()
    {
        $categories = ShopCategory::all();
        return $categories;
    }

    public function store(Request $request)
    {
        // response array object containing message and error indicator
        $response = array('message' => '', 'error' => false);
        // validate the sent request parameters using the following rules
        $validator = Validator::make($request->all(), [
            'shopName' => 'required|string|min:6',
            'description' => 'required|string|min:10',
            'founder' => 'string',
            'businessType' => 'string',
            'yearFounded' => 'integer|min:1900|max:' . date("Y"),
            'numberOfBranch' => 'integer',
            'location' => 'string',
            'category_id' => 'required|integer',
            'majorProduct' => 'string',
            'minorProduct' => 'string',
            'targetCustomer' => 'string',
            'contactNo' => 'string',
            'contactEmail' => 'email',
            'websiteLink' => 'url',
            'facebookLink' => 'url',
            'twitterLink' => 'url',
            'linkedinLink' => 'url',
            'timeOfOperation' => 'string',
            'startTime' => 'date_format:H:i',
            'closeTime' => 'date_format:H:i|after:startTime',
            'avatarInput' => 'required|image|max:2048',
        ]);

        /**
         * Set error true if the rules are not followed 
         * Set the error message from the validator to the response object
         */
        if ($validator->fails()) {
            $response['message'] = implode("<br>", $validator->messages()->all());
            $response['error'] = true;
        }
        else {
            // create new shop object
            $shop = new Shop();
            // loop through and save the sent request values
            foreach ($request->all() as $key => $value) {
                if ($key != 'avatarInput') {
                    $shop->$key = $value;
                }
            }

            // create a new unique string for the slug
            $bytes = random_bytes(20);
            $slug = bin2hex($bytes);
            $shop->slug = $slug;

            //set status
            $shop->status = 0;

            // check if an image was uploaded        
            if ($request->hasfile('avatarInput')) {
                $file = $request->file('avatarInput');

                $path = $file->store('/avatar', 'uploads');
                $name = $file->getClientOriginalName();
                // store the image path, name and type on the DB
                $attachments = [
                    'path' => $path,
                    'name' => $name
                ];

                $shop->attachments = $attachments;
            }

            $shop->save();
            // set response message to success
            $response['message'] = "Shop created successfully";
        }

        return $response;
    }

    public function getShops($categoryHash, $userId)
    {
        $categories = ShopCategory::where('category_name', 'like', '%' . $categoryHash . '%')->get();
        // shop object
        $shops = Shop::whereIn('category_id', $categories->pluck('id'))
            ->with([
            'favorites' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }
        ])
            ->get();

        return $shops;
    }

    public function getFavoriteShops($categoryHash, $userId)
    {
        $user = User::find($userId);
        $categories = ShopCategory::where('category_name', 'like', '%' . $categoryHash . '%')->get();
        // shop object
        $shops = Shop::whereIn('category_id', $categories->pluck('id'))
            ->whereIn('id', $user->shopFavorites()->pluck('shop_id'))
            ->with([
            'favorites' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }
        ])
            ->get();

        return $shops;
    }

    public function followShop(Request $request)
    {
        $user = User::find($request->post('userId'));
        $shop = Shop::where('slug', $request->post('shopSlug'))->first();

        // follow only the shop you have not followed before
        // dd($user->shopFollowing()->where('shop_id', $shop->id)->exists());
        if (!(ShopFollow::where('user_id', $user->id)->where('shop_id', $shop->id)->exists())) {

            // $vendorUser = User::where('id', $shop->user_id)->first();
            $vendorUser = $shop->owner;
            // notify the followed shop vendoruser
            $vendorUser->notify(new followShop($user));
            return $user->shopFollow($shop);
        }
        else {
            // unfollow shop if already following
            $follow = ShopFollow::where([
                ['shop_id', '=', $shop->id],
                ['user_id', '=', $user->id]
            ])->first()
                ->delete();
            return 0;
        }

    }

    // Get the number of followers the current shop has
    public function shopFollowers($slug)
    {
        $shop = Shop::where('slug', $slug)->first();
        return $shop->followers->count();
    }

    // checks if the authenticated is following a particular shop
    public function isFollowingShop($slug, $userId)
    {
        $shop = Shop::where('slug', $slug)->first();
        return $shop->followers()->where('user_id', $userId)->count();
    }

    public function favoriteShop(Request $request)
    {
        $user = User::find($request->post('userId'));
        $shop = Shop::where('slug', $request->post('shopSlug'))->first();

        // favorite only the shop you have not favorited before
        // if (!$user->shopFavorites()->where('shop_id', $shop->id)->exists()) {
        if (!(ShopFavorite::where('user_id', $user->id)->where('shop_id', $shop->id)->exists())) {

            // $vendorUser = User::where('id', $shop->user_id)->first();
            $vendorUser = $shop->owner;
            // notify the followed shop vendoruser
            $vendorUser->notify(new favShop($user));
            return $user->favoriteShop($shop);
        }
        else {
            // unfavorite shop if already following
            $favorite = ShopFavorite::where([
                ['shop_id', '=', $shop->id],
                ['user_id', '=', $user->id]
            ])->first()
                ->delete();
            return 0;
        }
    }

    public function isFavorited($slug, $userId)
    {
        $shop = Shop::where('slug', $slug)->first();
        return $shop->favorites()->where('user_id', $userId)->count();
    }

    public function createBlog(Request $request)
    {
        //--- Validation Section
        $rules = [
            'photo' => 'required|mimes:jpeg,jpg,png,svg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Blog();
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = time() . str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/uploads/blogs', $name);
            $input['photo'] = $name;
        }
        if (!empty($request->meta_tag)) {
            $input['meta_tag'] = implode(',', $request->meta_tag);
        }
        if (!empty($request->tags)) {
            $input['tags'] = $request->tags;
        }
        if ($request->secheck == "") {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
        }
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = 'Blog Post Created Successfully';
        return response()->json($msg);
    //--- Redirect Section Ends    
    }
}
