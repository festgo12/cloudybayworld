<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $casts = ['attachments' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($userId)
    {
        $attributes = ['user_id' => $userId];

        if (! $this->likes()->where($attributes)->exists()) {
            return $this->likes()->create($attributes);
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

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

}
