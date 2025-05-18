<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warna_222121', function (Blueprint $table) {
            $table->id('id_warna_222121');
            $table->unsignedBigInteger('id_produk_222121');
            $table->text('foto_222121');
            $table->text('warna_222121');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warna_222121');
    }
};
