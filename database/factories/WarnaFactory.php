<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warna>
 */
class WarnaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {


        return [
            'warna_222121' => fake()->unique()->randomElement(["#ff0000", "#00ff00", "#0000ff"]),
            'id_produk_222121' => Produk::factory(),
            'foto_222121' => fake()->unique()->randomElement(['images/shoe-1', 'images/shoe-2', 'images/shoe-3' ]),
        ];
    }
}
