<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $casts = [
        // 'startTime' => 'date:hh:mm',
        // 'closeTime' => 'date:hh:mm',
        'attachments' => 'array'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->hasOne(ShopCategory::class, 'id', 'category_id');
    }
}
