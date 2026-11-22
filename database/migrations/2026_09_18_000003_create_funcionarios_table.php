<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id('funcionario_id');
            $table->unsignedBigInteger('pessoa_id');
            $table->string('senha', 255); 
            $table->softDeletes();

            $table->foreign('pessoa_id') /* puxa um email, cpf e nome_pessoa */
                ->references('pessoa_id')->on('pessoas')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
