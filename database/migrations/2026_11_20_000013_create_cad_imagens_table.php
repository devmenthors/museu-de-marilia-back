<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cad_imagens', function (Blueprint $table) {
            $table->string('imagem_id', 45)->primary();
            $table->unsignedBigInteger('ficha_doacao_id');
            $table->string('img_key', 512);

            $table->foreign('ficha_doacao_id')
                ->references('ficha_doacao_id')->on('fichas_doacao')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cad_imagens');
    }
};
