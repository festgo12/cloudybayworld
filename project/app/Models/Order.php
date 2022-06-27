<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
         'user_id',   'cart',   'method',   'shipping',   'pickup_location',   'totalQty',   'pay_amount',   'txnid',   'charge_id',   'order_number',   'payment_status',   'customer_email',   'customer_name',   'customer_country',   'customer_phone',   'customer_address',   'customer_city',   'customer_zip',   'shipping_name',   'shipping_country',   'shipping_email',   'shipping_phone',   'shipping_address',   'shipping_city',   'shipping_zip',   'order_note',   'coupon_code',   'coupon_discount',   'status',   'shipping_cost',   'pay_id',   'vendor_shipping_id',   'tax',  
    ];

    public function vendororders()
    {
        return $this->hasMany('App\Models\VendorOrder');
    }

    public function tracks()
    {
        return $this->hasMany('App\Models\OrderTrack','order_id');
    }

  


}
