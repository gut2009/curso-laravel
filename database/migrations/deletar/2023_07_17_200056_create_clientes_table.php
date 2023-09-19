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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 80);
            $table->string('imagem', 100);
            $table->string('email', 50);
            $table->dateTime('nascimento');
            $table->string('cep', 9);
            $table->string('endereco', 120);
            $table->string('complemento', 120);
            $table->string('bairro', 80);
            $table->string('cidade', 80);
            $table->string('uf', 2);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};