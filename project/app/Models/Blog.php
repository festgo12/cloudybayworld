<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title','category_id','shop_id', 'details', 'photo', 'views','updated_at', 'status','meta_tag','meta_description','tags'];

    protected $dates = ['created_at'];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\BlogCategory','category_id')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
    }  

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function storyViews()
    {
        return $this->hasMany(StoryView::class);
    }

    public function veiw($userId)
    {
        $attributes = ['user_id' => $userId];

        if (! $this->storyViews()->where($attributes)->exists()) {
            $view = $this->storyViews()->create($attributes);
            return $view;
        }else{
            return $this->storyViews()->where($attributes);
        }
    }

    public function isViewedBy()
    {
        return $this->hasMany(StoryView::class, 'blog_id');
    }

}
