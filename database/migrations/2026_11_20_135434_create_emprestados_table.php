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
        Schema::create('emprestados', function (Blueprint $table) {
            $table->id('emprestado_id');
            $table->unsignedBigInteger('ficha_doacao_id')->unique();
            $table->dateTime('dt_encaminhado');
            $table->string('instituicao');
            $table->text('justificativa_encaminhado');

            $table->foreign('ficha_doacao_id')
                ->references('ficha_doacao_id')->on('fichas_doacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestados');
    }
};
