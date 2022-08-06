<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function feeds()
    {
        return $this->hasMany(Feed::class);
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

}
