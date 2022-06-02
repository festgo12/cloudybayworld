<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('attributable_id')->nullable()->unsigned();
             $table->string('attributable_type')->nullable();
             $table->string('name')->nullable();
             $table->string('input_name')->nullable();
             $table->integer('price_status')->comment('0-hide, 1-show')->default(1)->unsigned();
             $table->integer('details_status')->comment('0-hide, 1-show')->default(1)->unsigned();
             $table->timestamp('created_at')->nullable();
             $table->timestamp('updated_at')->nullable();
            
             $table->index(['attributable_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
    }
}
