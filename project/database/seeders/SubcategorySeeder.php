<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
			[
				'category_id' => '3',
				'name' => 'Food Stuff',
				'slug' => 'food-stuff',
				'slug' => '1',
			],
			[
				'category_id' => '1',
				'name' => 'Samsung Phone',
				'slug' => 'samsung',
				'slug' => '1',
			],
			[
				'category_id' => '1',
				'name' => ' IPhone',
				'slug' => 'iphone',
				'slug' => '1',
			],
			[
				'category_id' => '5',
				'name' => ' Cars',
				'slug' => 'cars',
				'slug' => '1',
			],
			[
				'category_id' => '2',
				'name' => ' Mens',
				'slug' => 'mens',
				'slug' => '1',
			],
			
		]);
    }
}
