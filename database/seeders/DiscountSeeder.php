<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Str;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discount::factory()->create([
            'kode_222121' => Str::random(5),
            'discount_222121' => 20,
        ]);
        Discount::factory()->create([
            'kode_222121' => Str::random(5),
            'discount_222121' => 60,
        ]);
        Discount::factory()->create([
            'kode_222121' => Str::random(5),
            'discount_222121' => 30,
        ]);
    }
}
