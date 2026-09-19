<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doacoes', function (Blueprint $table) {
            $table->id('protocolo_doacao');
            $table->text('historico')->nullable();
            $table->text('justificativa')->nullable();
            $table->string('tip_acervo', 45);
            // Coluna "status" (texto livre) mantida junto com status_id (FK),
            // exatamente como aparece no diagrama. Confirme se as duas são
            // realmente necessárias ou se "status" é resquício de versão antiga.
            $table->string('status', 45)->nullable();
            $table->dateTime('dt_recebimento');
            $table->timestamp('confirmado_em')->nullable();

            $table->unsignedBigInteger('status_id');
            $table->string('pessoa_cpf', 11);
            $table->string('doador_cpf', 11)->nullable();

            $table->foreign('status_id')
                ->references('status_id')->on('status')
                ->restrictOnDelete();

            $table->foreign('pessoa_cpf')
                ->references('cpf')->on('pessoas')
                ->restrictOnDelete();

            $table->foreign('doador_cpf')
                ->references('cpf')->on('doadores')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doacoes');
    }
};
