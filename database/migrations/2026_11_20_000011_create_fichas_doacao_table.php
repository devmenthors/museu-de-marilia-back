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
        Schema::create('fichas_doacao', function (Blueprint $table) {
            $table->id('ficha_doacao_id');
            $table->string('codigo_protocolo')->nullable()->unique();
            $table->string('nome_acervo');

            /* ENUMS na Model [App/Enum] */
            $table->string('categoria_acervo'); /* no model, é apontado como ENUM, assim a pessoa escolhe */
            $table->string('estado_conservacao'); /* ENUM tb, no model e pasta App/Enum */
            $table->string('status_atual')->nullable(); /* ENUM na Model (Em Análise, Emprestado, Reserva Tecnica, Exposto, Descartado */


            $table->integer('qnt_itens');

            $table->string('cor')->nullable();
            $table->decimal('largura', 10, 2)->nullable();
            $table->decimal('altura', 10, 2)->nullable();

            $table->longText('descricao')->nullable();

            $table->date('dt_incorporacao')->nullable();
            $table->dateTime('dt_recebimento')->nullable();
            $table->dateTime('confirmado_em')->nullable()->default(null);
            $table->softDeletes();

            /* FK'S */
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->unsignedBigInteger('doador_id')->nullable();
            //$table->unsignedBigInteger('log_atual_id'); | tive que tirar se não a migration n rodava

            $table->foreign('funcionario_id')
                ->references('funcionario_id')->on('funcionarios')
                ->nullOnDelete();
            $table->foreign('doador_id')
                ->references('doador_id')->on('doadores')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas_doacao');
    }
};
