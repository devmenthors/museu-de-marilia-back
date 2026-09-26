<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('antiguidades', function (Blueprint $table) {
            $table->id('antiguidade_id');
            $table->unsignedBigInteger('ficha_acervo_id')->nullable();
            $table->decimal('valor', 10, 2);

            $table->foreign('ficha_acervo_id')
                ->references('id_ficha_acervo')->on('fichas_de_registro_acervo')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('antiguidades');
    }
};