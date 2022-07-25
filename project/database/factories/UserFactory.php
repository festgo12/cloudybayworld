<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            

            'firstname' => $this->faker->firstName,

            'lastname' => $this->faker->lastName,

            'username' => $this->faker->userName,

            'email' => $this->faker->unique()->safeEmail,

            'password' => bcrypt('12345678'),

            'email_verified_at' => now(),

            'remember_token' => Str::random(10),

            'created_at' => $this->faker->dateTime,

            'updated_at' => $this->faker->dateTime,

            'is_vendor' => $this->faker->numberBetween(0,1),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
