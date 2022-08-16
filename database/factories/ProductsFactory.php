<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(4, true),
            'image' => 'https://avatars.dicebear.com/api/identicon/' . fake()->unique()->randomNumber() . '.svg',
            'weight' => fake()->numberBetween(0,1000),
            'SKU' => strtoupper(fake()->bothify('????###')),
            'price' => fake()->randomFloat(2, 0, 1000)
        ];
    }
}
