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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leitor_id');
            $table->unsignedBigInteger('livro_id');
            $table->dateTime('dt_inicio');
            $table->dateTime('dt_devolucao');
            $table->dateTime('dt_final');
            $table->integer('status');
            $table->timestamps();


            //foreign key (constraints)
            $table->foreign('leitor_id')->references('id')->on('leitores');
            $table->foreign('livro_id')->references('id')->on('livros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};