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
        Schema::create('em_analises', function (Blueprint $table) {
            $table->id('em_analise_id');
            $table->unsignedBigInteger('ficha_doacao_id')->unique();
            $table->text('parecer_tec')->nullable();
            $table->boolean('apto_incorporado')->nullable();
            $table->boolean('apto_exposicao')->nullable();
            $table->text('obs_laudo')->nullable();
            $table->boolean('aprovado')->nullable();

            $table->foreign('ficha_doacao_id')
                ->references('ficha_doacao_id')->on('fichas_doacao');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('em_analises');
    }
};
