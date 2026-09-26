<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('encaminhados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_fluxo')->primary();
            $table->dateTime('dt_encaminhado');
            $table->string('instituicao', 150);
            $table->text('justificativa_encaminhado');

            $table->foreign('id_fluxo')
                ->references('id_fluxo')->on('fluxos')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encaminhados');
    }
};
