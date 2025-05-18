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
        Schema::create('produk_222121', function (Blueprint $table) {
            $table->id('id_produk_222121');
            $table->unsignedBigInteger('id_category_222121');
            $table->string('nama_222121');
            $table->string('deskripsi_222121');
            $table->string('thumbnail_222121');
            $table->double('harga_222121');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_222121');
    }
};
