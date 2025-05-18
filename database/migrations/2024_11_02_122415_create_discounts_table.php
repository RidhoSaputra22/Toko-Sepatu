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
        Schema::create('discount_222121', function (Blueprint $table) {
            $table->id('id_discount_222121');
            $table->string('kode_222121');
            $table->double('batas_222121')->default(100000);
            $table->integer('discount_222121')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_222121');
    }
};
