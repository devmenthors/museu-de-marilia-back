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
            $table->string('img_key', 512);
            $table->unsignedBigInteger('doacao_id');

            $table->foreign('doacao_id')
                ->references('id_doacao')->on('doacoes')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cad_imagens');
    }
};