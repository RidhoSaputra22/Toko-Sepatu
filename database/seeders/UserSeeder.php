<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
