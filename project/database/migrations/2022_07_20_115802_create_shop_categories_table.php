<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
			$table->string('icon_path');
            $table->timestamps();
        });

        // Insert some categories  
		DB::table('shop_categories')->insert([
			[
				'category_name' => 'Clothing',
				'icon_path' => '<i class="icofont icofont-hanger m-r-10"></i>'
			],
			[
				'category_name' => 'Food & Drinks',
				'icon_path' => '<i class="icofont icofont-fast-food m-r-10"></i>'
			],
			[
				'category_name' => 'Markets',
				'icon_path' => '<i class="icofont icofont-food-basket m-r-10"></i>'
			],
			[
				'category_name' => 'Hotels & suites',
				'icon_path' => '<i class="icofont icofont-hotel m-r-10"></i>'
			],
			[
				'category_name' => 'Hospitals',
				'icon_path' => '<i class="icofont icofont-hospital m-r-10"></i>'
			],
			[
				'category_name' => 'Phones',
				'icon_path' => '<i class="icofont icofont-ui-touch-phone m-r-10"></i>'
			]
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_categories');
    }
}
