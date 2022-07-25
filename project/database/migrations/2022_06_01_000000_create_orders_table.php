<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->nullable()->unsigned();
             $table->text('cart');
             $table->string('method', 255)->nullable();
             $table->string('shipping', 255)->nullable();
             $table->string('pickup_location', 255)->nullable();
             $table->string('totalQty', 200)->default(1);
             $table->decimal('pay_amount');
             $table->string('txnid', 255)->nullable();
             $table->string('charge_id', 255)->nullable();
             $table->string('order_number', 255);
             $table->string('payment_status', 255);
             $table->string('customer_email', 255);
             $table->string('customer_name', 255);
             $table->string('customer_country', 200);
             $table->string('customer_phone');
             $table->string('customer_address')->nullable();
             $table->string('customer_city')->nullable();
             $table->string('customer_zip')->nullable();
             $table->string('shipping_name')->nullable();
             $table->string('shipping_country');
             $table->string('shipping_email')->nullable();
             $table->string('shipping_phone')->nullable();
             $table->string('shipping_address')->nullable();
             $table->string('shipping_city')->nullable();
             $table->string('shipping_zip')->nullable();
             $table->text('order_note')->nullable();
             $table->string('coupon_code')->nullable();
             $table->string('coupon_discount')->nullable();
             $table->enum('status', ['pending', 'processing' ,'completed','declined', 'on delivery'])->default('pending');
             $table->decimal('shipping_cost');
             $table->string('currency_sign')->nullable();
             $table->double('currency_value')->default(0)->nullable();
             $table->text('pay_id')->nullable();
             $table->integer('dp')->default(0);
             $table->integer('vendor_shipping_id');
             $table->integer('tax');
             $table->timestamp('created_at')->nullable();
             $table->timestamp('updated_at')->nullable();
            
             $table->index(['user_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
