<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status_item_log', function (Blueprint $table) {
            $table->id('log_id');

            /* FK's */
            $table->unsignedBigInteger('ficha_doacao_id');
            $table->unsignedBigInteger('funcionario_id');
            
            $table->foreign('ficha_doacao_id')
                ->references('ficha_doacao_id')->on('fichas_doacao');
            $table->foreign('funcionario_id') // ID do funcionario que fez a modificacao (faz sentido na minha cbc)
                ->references('funcionario_id')->on('funcionarios')
                ->nullOnDelete();

            /* ambos tem o mesmo enum do status lá do fichas doacao table */
            $table->string('from_status')->nullable();
            $table->string('to_status');

            /* morph to com detail_type e detail_id */
            $table->nullableMorphs('status_detail');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_item_log');
    }
};
