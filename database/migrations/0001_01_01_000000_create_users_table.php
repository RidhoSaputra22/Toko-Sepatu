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
        Schema::create('user_222121', function (Blueprint $table) {
            $table->id('id_user_222121');
            $table->string('nama_222121');
            $table->string('alamat_222121');
            $table->string('email_222121');
            $table->string('password_222121');
            $table->string('role_222121');
            $table->string('foto_222121');
            $table->timestamps();
        });


        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_222121');
        Schema::dropIfExists('sessions');
    }
};
