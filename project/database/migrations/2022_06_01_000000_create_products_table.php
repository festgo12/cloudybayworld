<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->comment('user vendor')->default(0)->unsigned();
             $table->integer('shop_id')->nullable()->unsigned();
             $table->string('sku')->nullable();
             $table->integer('category_id');
             $table->integer('subcategory_id')->nullable()->unsigned();
             $table->integer('childcategory_id')->nullable()->unsigned();
             $table->text('attributes')->nullable();
             $table->string('name');
             $table->string('slug')->nullable();
             $table->string('image');
             $table->string('file')->nullable();
             $table->string('thumbnail')->nullable();
             $table->string('size')->nullable();
             $table->string('size_qty')->nullable();
             $table->string('size_price')->nullable();
             $table->text('color')->nullable();
             $table->decimal('price');
             $table->decimal('previous_price')->nullable();
             $table->text('details')->nullable();
             $table->integer('stock')->nullable();
             $table->text('policy')->nullable();
             $table->integer('status')->default(1)->unsigned();
             $table->integer('views')->default(0)->unsigned();
             $table->string('tags')->nullable();
             $table->text('features')->nullable();
             $table->text('colors')->nullable();
             $table->tinyInteger('product_condition')->default(0);
             $table->string('ship')->nullable();
             $table->integer('is_meta')->default(0);
             $table->text('meta_tag')->nullable();
             $table->text('meta_description')->nullable();
             $table->string('youtube')->nullable();
             $table->enum('type', ['Physical', 'Digital', 'License' ]);
             $table->text('license')->nullable();
             $table->text('license_qty')->nullable();
             $table->text('link')->nullable();
             $table->string('platform')->nullable();
             $table->string('licence_type')->nullable();
             $table->integer('festured')->default(0);
             $table->integer('best')->default(0);
             $table->integer('top')->default(0);
             $table->integer('hot')->default(0);
             $table->integer('latest')->default(0);
             $table->integer('big')->default(0);
             $table->integer('trending')->default(0);
             $table->timestamp('created_at')->nullable();
             $table->timestamp('updated_at')->nullable();
             $table->integer('is_discount')->default(0);
             $table->text('discount_date')->nullable();
             $table->text('whole_sell_qty')->nullable();
             $table->text('whole_sell_discount')->nullable();
             $table->integer('is_catalog')->default(0);
             $table->integer('catalog_id')->default(0);
            
             $table->index(['name']);
             $table->unique(['sku']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
