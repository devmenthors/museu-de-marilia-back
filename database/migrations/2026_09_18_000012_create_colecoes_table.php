<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('colecoes', function (Blueprint $table) {
            $table->id('colecao_id');
            $table->string('nome_colecao', 150);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('colecoes');
    }
};
