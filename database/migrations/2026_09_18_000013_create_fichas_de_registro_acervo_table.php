<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fichas_de_registro_acervo', function (Blueprint $table) {
            $table->id('protocolo_registro_acervo');
            $table->dateTime('dt_incorporacao');
            $table->string('antigo_proprietario', 150)->nullable();
            $table->string('estado_conservacao', 45);
            $table->integer('qnt_itens');
            $table->string('cor', 45)->nullable();
            // DECIMAL(100) no diagrama não é uma precisão válida de banco;
            // assumi decimal(10,2) (medidas em metros/cm com 2 casas). Ajuste
            // a precisão/escala se precisar de mais casas decimais.
            $table->decimal('largura', 10, 2)->nullable();
            $table->decimal('altura', 10, 2)->nullable();
            $table->text('descricao')->nullable(); // "desc" no diagrama; renomeado por ser palavra reservada em SQL
            $table->unsignedBigInteger('colecao_id');
            // Novo vínculo com em_analises pedido na ordem de execução.
            // Deixei nullable pois nem toda ficha precisa ter vindo de uma
            // análise (ex.: itens já incorporados antes desse fluxo existir).
            $table->unsignedBigInteger('protocolo_analise')->nullable();

            $table->foreign('colecao_id')
                ->references('colecao_id')->on('colecoes')
                ->restrictOnDelete();

            $table->foreign('protocolo_analise')
                ->references('protocolo_analise')->on('em_analises')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fichas_de_registro_acervo');
    }
};
