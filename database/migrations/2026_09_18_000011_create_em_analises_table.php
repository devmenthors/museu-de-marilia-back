<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('em_analises', function (Blueprint $table) {
            $table->id('id_analise');
            $table->text('parecer_tec')->nullable();
            $table->boolean('apto_incorporacao')->nullable();
            $table->boolean('apto_exposicao')->nullable();
            $table->text('obs_laudo')->nullable();
            $table->boolean('aprovado')->nullable();
            $table->unsignedBigInteger('id_fluxo');

            $table->foreign('id_fluxo')
                ->references('id_fluxo')->on('fluxos')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('em_analises');
    }
};
