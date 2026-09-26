<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doadores', function (Blueprint $table) {
            $table->string('cpf', 11)->primary();
            $table->string('telefone', 11);

            $table->foreign('cpf')
                ->references('cpf')->on('pessoas')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doadores');
    }
};
