<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name', 200);
             $table->string('slug', 200);
             $table->integer('status')->default(1)->unsigned();
             $table->string('photo', 200)->nullable();
             $table->tinyInteger('is_featured')->default(0)->unsigned();
             $table->string('image')->nullable();
             $table->timestamp('updated_at')->nullable();
             $table->timestamp('created_at')->nullable();
            
             $table->index(['name']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
