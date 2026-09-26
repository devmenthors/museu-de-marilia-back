<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->string('pessoa_cpf', 11)->primary();
            $table->string('senha', 255); 
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
