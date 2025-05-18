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
        Schema::create('cart_222121', function (Blueprint $table) {
            $table->id('id_cart_222121');
            $table->unsignedBigInteger('id_user_222121');
            $table->unsignedBigInteger('id_produk_222121');
            $table->unsignedBigInteger('id_discount_222121')->nullable();
            $table->unsignedBigInteger('id_ukuran_222121');
            $table->unsignedBigInteger('id_warna_222121');
            $table->integer('jumlah_222121');
            $table->double('total_222121');
            $table->string('kode_222121')->nullable();
            $table->string('status_222121');
            $table->timestamps();
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_222121');
    }
};
