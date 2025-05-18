<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\Produk;
use App\Models\Ukuran;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_produk_222121' => Produk::factory(),
            'id_user_222121' => User::factory(),
            'id_discount_222121' => Discount::factory(),
            'id_ukuran_222121' => Ukuran::factory(),
            'jumlah_222121' => 10,
            'total_222121' => fake()->randomNumber(),
            'kode_222121' => null,
            'status_222121' => 'belum',
        ];
    }
}
