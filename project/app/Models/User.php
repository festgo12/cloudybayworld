<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'avatar',
        'username',
        'is_vendor',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'attachments' => 'array'

    ];

    public function IsVendor(){
        if ($this->is_vendor == 1) {
           return true;
        }
        return false;
    }

   

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\Wishlist');
    }

    // Multi Vendor

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function vendororders()
    {
        return $this->hasMany('App\Models\VendorOrder','user_id');
    }

    public function shippings()
    {
        return $this->hasMany('App\Models\Shipping','user_id');
    }

    public function wishlistCount()
    {
        return \App\Models\Wishlist::where('user_id','=',$this->id)->with(['product'])->whereHas('product', function($query) {
                    $query->where('status', '=', 1);
                 })->count();

                }
    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }

    public function shop()
    {
        return $this->hasOne(Shop::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();

    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
    }

    public function follow(User $user)
    {
        return $this->following()->save($user);
    }

    public function shopFollowing()
    {
        return $this->belongsToMany(User::class, 'shop_follows', 'user_id', 'shop_id')->withTimestamps();
    }


    public function shopFollow(Shop $shop)
    {
        return $this->shopFollowing()->save($shop);
    }

    public function shopFavorites()
    {
        return $this->belongsToMany(User::class, 'shop_favorites', 'user_id', 'shop_id')->withTimestamps();
    }

    public function favoriteShop(Shop $shop)
    {
        return $this->shopFavorites()->save($shop);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'shop_favorites', 'shop_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\ChMessage', 'from_id');
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
