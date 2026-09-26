<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id('endereco_id');
            $table->string('cep', 8);
            $table->string('estado', 255);
            $table->string('cidade', 150);
            $table->string('bairro', 150);
            $table->string('logradouro', 255);
            $table->integer('numero');
            $table->text('complemento')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};