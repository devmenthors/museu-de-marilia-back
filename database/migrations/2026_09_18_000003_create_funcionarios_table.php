<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        // Sem PK própria visível no diagrama: assumi que cada Pessoa pode
        // virar Funcionario 1:1, então pessoa_cpf é PK+FK. Se um funcionário
        // não precisar necessariamente ter cadastro em Pessoas, isso muda.
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->string('pessoa_cpf', 11)->primary();
            $table->string('senha', 255); // guarde sempre com Hash::make(), 45 chars é curto demais pra um hash bcrypt
            $table->timestamp('timestamp')->nullable();

            $table->foreign('pessoa_cpf')
                ->references('cpf')->on('pessoas')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
