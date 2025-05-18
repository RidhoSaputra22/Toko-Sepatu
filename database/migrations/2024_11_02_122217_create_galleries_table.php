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
        Schema::create('galleri_222121', function (Blueprint $table) {
            $table->id('id_galleri_222121');
            $table->unsignedBigInteger('id_produk_222121');
            $table->string('foto_222121');
            $table->timestamps();


            $table->foreign('id_produk_222121')->references('id_produk_222121')->on('produk_222121')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleri_222121');
    }
};
