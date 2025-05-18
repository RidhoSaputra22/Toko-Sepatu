<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Gallery;
use App\Models\Produk;
use App\Models\Ukuran;
use App\Models\User;
use App\Models\Warna;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(1)->create([
            'nama_222121' =>  'admin',
            'alamat_222121' =>  'admin',
            'email_222121' =>  'admin@gmail.com',
            'password_222121' => Hash::make('admin'),
            'role_222121' => 'admin',
        ]);

        User::factory(1)->create([
            'nama_222121' =>  'user',
            'alamat_222121' =>  'user',
            'email_222121' =>  'user@gmail.com',
            'password_222121' => Hash::make('user'),
            'role_222121' => 'user',
        ]);

        // Ukuran::factory(3)->create();
        // Warna::factory(3)->create();
        // Cart::factory(10)->create();
        // Produk::create(3)->create();

    }
}
