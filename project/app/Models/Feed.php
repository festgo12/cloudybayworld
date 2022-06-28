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
}
