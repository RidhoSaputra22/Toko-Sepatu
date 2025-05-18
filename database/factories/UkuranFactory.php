<?php

namespace Database\Factories;

use App\Models\Produk;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ukuran>
 */
class UkuranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
            
            return [
                'ukuran_222121' => fake()->unique()->randomElement([32, 24, 14, 15]),
                'id_produk_222121' => Produk::factory(),
                'stok_222121' => fake()->randomElement([32, 24, 14, 15]),
            ];


    }
}