<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'user_id',   'shop_id',   'sku',   'category_id',   'subcategory_id',   'childcategory_id',   'attributes',   'name',   'slug',   'image',   'thumbnail',   'size',   'size_qty',   'size_price',   'color',   'price',   'previous_price',   'details',   'stock',   'policy',   'status',   'views',   'tags',   'features',   'colors',   'product_condition',   'ship',   'is_meta',   'meta_tag',   'meta_description',   'youtube',   'type',   'license',   'license_qty',   'link',   'platform',   'licence_type',   'festured',   'best',   'top',   'hot',   'latest',   'big',   'trending',   'is_discount',   'discount_date',   'whole_sell_qty',   'whole_sell_discount',   'is_catalog',   'catalog_id',  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      
    ];

  


}
