<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class VendorOrder extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vendor_orders';

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
         'user_id',   'order_id',   'qty',   'price',   'order_number',   'status',  
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault(function ($data) {
			foreach($data->getFillable() as $dt){
				$data[$dt] = __('Deleted');
			}
		});
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order')->withDefault(function ($data) {
        foreach($data->getFillable() as $dt){
          $data[$dt] = __('Deleted');
        }
      });
    }

  


}
