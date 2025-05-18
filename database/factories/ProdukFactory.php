<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Ukuran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     
     protected static $counter = 0;
     protected static $category = null;

    public function definition(): array
    {

        if(self::$counter % 3 == 0){
            self::$category = Category::factory()->create();
        }

        self::$counter++;

     


        return [
            'id_category_222121' => self::$category['id_category_222121'],
            'nama_222121' => fake()->word(2),
            'deskripsi_222121' => fake()->sentence(),
            'thumbnail_222121' => 'image/produk/sepatu.jpeg', 
            'harga_222121' => fake()->randomElement([320000, 240000, 140000, 159000]),
        ];

    }
}
