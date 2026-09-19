<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Relação 1:1 opcional com Fluxos (nenhuma PK própria aparece no
        // diagrama), então usei id_fluxo como PK+FK. Ajuste se na verdade
        // essa tabela precisa de uma PK própria.
        Schema::create('nao_incorporados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_fluxo')->primary();
            $table->text('justificativa_naoincorporado');

            $table->foreign('id_fluxo')
                ->references('id_fluxo')->on('fluxos')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nao_incorporados');
    }
};
