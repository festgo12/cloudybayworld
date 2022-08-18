<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->unsigned();
             $table->integer('product_id')->unsigned();
             $table->text('review')->nullable();
             $table->tinyInteger('rating');
             $table->dateTime('review_date');
             $table->timestamp('created_at')->nullable();
             $table->timestamp('updated_at')->nullable();
            
             $table->index(['user_id']);
             $table->index(['product_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
