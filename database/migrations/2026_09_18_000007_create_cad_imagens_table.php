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
            $table->unsignedBigInteger('protocolo_doacao');

            // O diagrama mostra "2 more..." colunas escondidas nessa tabela
            // que eu não consigo ler na imagem. Me diga quais são (tipo,
            // tamanho, ordem de exibição etc.) que eu completo essa migration.

            $table->foreign('protocolo_doacao')
                ->references('protocolo_doacao')->on('doacoes')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cad_imagens');
    }
};
