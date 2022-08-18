<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
             $table->increments('id');
             $table->string('code')->unique();
             $table->integer('type');
             $table->decimal('price');
             $table->string('times')->nullable();
             $table->integer('used')->default(0);
             $table->integer('status')->default(1);
             $table->date('start_date');
             $table->date('end_date');
             $table->timestamp('created_at')->nullable();
             $table->timestamp('updated_at')->nullable();
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
