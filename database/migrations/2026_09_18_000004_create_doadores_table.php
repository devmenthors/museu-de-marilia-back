<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doadores', function (Blueprint $table) {
            $table->id('doador_id');
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->unsignedBigInteger('pessoa_id');
            $table->string('telefone', 11);
            $table->softDeletes();
            
            $table->foreign('funcionario_id')
                ->references('funcionario_id')->on('funcionarios')
                ->nullOnDelete(); /* se funcionario não trabalhar mais na empresa, cadastro nao é excluido */

            $table->foreign('pessoa_id')
                ->references('pessoa_id')->on('pessoas')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doadores');
    }
};
