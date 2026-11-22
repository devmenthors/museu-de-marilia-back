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
        Schema::create('exposicoes', function (Blueprint $table) {
            $table->id('exposicao_id');
            $table->unsignedBigInteger('ficha_doacao_id')->unique();
            $table->integer('sala');
            $table->integer('gondola');

            $table->foreign('ficha_doacao_id')
                ->references('ficha_doacao_id')->on('fichas_doacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exposicoes');
    }
};
