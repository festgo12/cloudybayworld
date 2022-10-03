<?php

namespace App\Models;

use App\Notifications\feedPostliked;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $casts = ['attachments' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class, 'feedable_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($userId)
    {
        $attributes = ['user_id' => $userId];
        $user = User::where('id', $userId)->first();


        if (! $this->likes()->where($attributes)->exists()) {

            $like = $this->likes()->create($attributes);

            $feed = Feed::where('feed_id', $like->feed_id)->first();

                // getting the notifiable profile/shop for post likes  

                if($feed->feedable_type == 'User'){

                    $feedable_user = User::where('id', $feed->feedable_id)->first();

                    $feedable_user->notify(new feedPostliked($user));
               

                    
                }elseif($feed->feedable_type == 'Shop')
                {
                    
                    $shop = Shop::where('id', $feed->feedable_id)->first();
                    $vendorUser = $shop->owner;
                    // $vendorUser = User::where('id', $shop->user_id)->first();

                    $vendorUser->notify(new feedPostliked($user));

                    
                }
    

            // // notify the followed shop vendoruser
            // $vendorUser->notify(new favShop($user));

            return $like;

        }else{
            return $this->likes()->where($attributes)->delete();
        }
    }

    public function isLikedBy()
    {
        return $this->hasMany(Like::class, 'feed_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'feedable_id');
    }

}
