<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
			[
				'name' => 'Phones',
				'slug' => 'phones',
				'status' => '1',
				'photo' => 'cat.jpg',
				'is_featured' => '0',
				'image' => 'cat.jpg'
			],
			[
				'name' => 'Clothing',
				'slug' => 'clothing',
				'status' => '1',
				'photo' => 'cat.jpg',
				'is_featured' => '0',
				'image' => 'cat.jpg'
			],
			[
				'name' => 'Foods Stuff',
				'slug' => 'foods-stuff',
				'status' => '1',
				'photo' => 'cat.jpg',
				'is_featured' => '0',
				'image' => 'cat.jpg'
			],
			[
				'name' => 'Skin Care',
				'slug' => 'skin-care',
				'status' => '1',
				'photo' => 'cat.jpg',
				'is_featured' => '0',
				'image' => 'cat.jpg'
			],
			[
				'name' => 'Autos',
				'slug' => 'autos',
				'status' => '1',
				'photo' => 'cat.jpg',
				'is_featured' => '0',
				'image' => 'cat.jpg'
			],
			
		]);
    }
}
