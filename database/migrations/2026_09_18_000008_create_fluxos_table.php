<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fluxos', function (Blueprint $table) {
            $table->id('id_fluxo');
            $table->text('descricao');
            $table->timestamp('data_criado')->useCurrent();
            $table->timestamp('data_atualizado')->useCurrent()->useCurrentOnUpdate();
            $table->unsignedBigInteger('protocolo_doacao')->nullable();

            $table->foreign('protocolo_doacao')
                ->references('protocolo_doacao')->on('doacoes')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fluxos');
    }
};
