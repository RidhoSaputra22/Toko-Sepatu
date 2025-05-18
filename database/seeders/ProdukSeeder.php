<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\Ukuran;
use App\Models\Warna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $produk = Produk::factory()->create();


        $ukuran = Ukuran::factory()->create([
            'ukuran_222121' => fake()->unique()->randomElement(range(10, 50)), // Larger pool
            'id_produk_222121' => $produk['id_produk_222121'],
            'stok_222121' => fake()->unique()->randomElement(range(10, 50)), // Larger pool
        ]);
        
        $ukuran = Ukuran::factory()->create([
            'ukuran_222121' => fake()->unique()->randomElement(range(10, 50)), // Larger pool
            'id_produk_222121' => $produk['id_produk_222121'],
            'stok_222121' => fake()->unique()->randomElement(range(10, 50)), // Larger pool
        ]);
        
        $warna = Warna::factory()->create([
            'warna_222121' => fake()->unique()->randomElement(["#ff0000", "#00ff00", "#0000ff", "#ffff00", "#00ffff"]),
            'id_produk_222121' => $produk['id_produk_222121'],
            'foto_222121' => 'image/shoe-1.jpg',
        ]);
        
        $warna = Warna::factory()->create([
            'warna_222121' => fake()->unique()->randomElement(["#ff0000", "#00ff00", "#0000ff", "#ffff00", "#00ffff"]),
            'id_produk_222121' => $produk['id_produk_222121'],
            'foto_222121' => 'image/shoe-2.jpg',
        ]);
        


        
    }
}