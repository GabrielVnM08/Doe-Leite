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
        Schema::create('doacaos', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_ponto')->references('id')->on('ponto_coleta');
            $table->foreign('nome_ponto')->references('nome')->on('ponto_coleta');
            $table->date('data_doacao');
            $table->integer('quantidade');
            $table->string('nome_doadora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doacaos');
    }
};
