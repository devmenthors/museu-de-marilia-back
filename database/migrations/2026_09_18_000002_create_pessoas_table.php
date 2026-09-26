<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->string('cpf', 11)->primary();
            $table->string('nome_pessoa', 150);
            $table->string('email', 255);
            $table->unsignedBigInteger('endereco_id')->nullable();

            $table->foreign('endereco_id')
                ->references('endereco_id')->on('enderecos')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};