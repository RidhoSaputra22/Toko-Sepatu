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
        Schema::table('cart_222121', function(Blueprint $table){
            $table->foreign('id_user_222121')->references('id_user_222121')->on('user_222121')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_produk_222121')->references('id_produk_222121')->on('produk_222121')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_discount_222121')->references('id_discount_222121')->on('discount_222121')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ukuran_222121')->references('id_ukuran_222121')->on('ukuran_222121')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_warna_222121')->references('id_warna_222121')->on('warna_222121')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::table('produk_222121', function(Blueprint $table){
            $table->foreign('id_category_222121')->references('id_category_222121')->on('category_222121')->onDelete('cascade')->onUpdate('cascade');
          
        });

        Schema::table('warna_222121', function(Blueprint $table){
            $table->foreign('id_produk_222121')->references('id_produk_222121')->on('produk_222121')->onDelete('cascade')->onUpdate('cascade');
          
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
