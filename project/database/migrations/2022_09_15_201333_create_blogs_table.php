<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('shop_id')->nullable()->default(0);
            $table->string('title');
            $table->text('details');
            $table->string('photo')->nullable();
            // $table->string('source');
            $table->integer('views')->default(0);
            $table->tinyInteger('status')->default(1);
            // $table->tinyInteger('is_highlight')->default(0);
            $table->text('meta_tag')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
