<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childcategories', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('subcategory_id');
             $table->string('name', 200);
             $table->string('slug', 200);
             $table->tinyInteger('status')->default(1);
             $table->timestamp('created_at')->nullable();
             $table->timestamp('updated_at')->nullable();
            
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
        Schema::dropIfExists('childcategories');
    }
}
