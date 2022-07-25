<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           
            'user_id' => '20',
            'shop_id' => $this->faker->numberBetween(1,2),
            'sku' => Str::random(10),
            'category_id' => $this->faker->numberBetween(1,10),
            'subcategory_id' => $this->faker->numberBetween(1,10),
            'childcategory_id' => $this->faker->numberBetween(1,10),
            'name' => $this->faker->streetName,
            'slug' => $this->faker->unique()->userName,
            'image' => 'product.jpg',
            'thumbnail' => 'product.jpg',
            'size' => 'S,M,L',
            'size_qty' => $this->faker->numberBetween(20,100),
            'size_price' => 2,
            'color' => $this->faker->hexColor,
            'price' => $this->faker->numberBetween(1,50),
            'previous_price' => $this->faker->numberBetween(3,100),
            'details' => $this->faker->text(200),
            'stock' => $this->faker->numberBetween(1,100),
            'policy' => $this->faker->text,
            'status' => 1,
            'views' => $this->faker->numberBetween(1,50),
            'tags' => 'clothing,bag',
            'ship' => '5-7 days',
            'features' => $this->faker->text,
            // 'colors' => $this->faker->hexColor,
            'product_condition' => 2,
            'type' => 'Physical',
            'youtube' => 'https://www.youtube.com/watch?v=HxNydN5tScI',
            'festured' => $this->faker->numberBetween(0,1),
            'best' => $this->faker->numberBetween(0,1),
            'top' => $this->faker->numberBetween(0,1),
            'latest' => $this->faker->numberBetween(0,1),
            
        ];
    }
}
