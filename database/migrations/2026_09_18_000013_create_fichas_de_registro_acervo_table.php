<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fichas_de_registro_acervo', function (Blueprint $table) {
            $table->id('id_ficha_acervo'); 
            $table->string('codigo_protocolo', 45)->unique(); 
            $table->string('categoria_acervo', 45); 
            $table->dateTime('dt_incorporacao');
            $table->string('antigo_proprietario', 150)->nullable();
            $table->string('estado_conservacao', 45);
            $table->integer('qnt_itens');
            $table->string('cor', 45)->nullable();
            $table->decimal('largura', 10, 2)->nullable();
            $table->decimal('altura', 10, 2)->nullable();
            $table->text('descricao')->nullable(); 
            $table->unsignedBigInteger('colecao_id');
            $table->unsignedBigInteger('id_analise')->nullable();

            $table->timestamps(); 

            $table->foreign('colecao_id')
                ->references('colecao_id')->on('colecoes')
                ->restrictOnDelete();

            $table->foreign('id_analise')
                ->references('id_analise')->on('em_analises')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fichas_de_registro_acervo');
    }
};
