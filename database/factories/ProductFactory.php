<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'slug' => fake()->unique()->text(),
            'description' => fake()->text(),
            'price' => rand(1,50),
            'quantity' => random_int(0,100),
            'views' => random_int(1,5),
            'category_id' => rand(6,11)
        ];
    }
}
