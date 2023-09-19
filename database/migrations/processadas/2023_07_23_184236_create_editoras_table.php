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
        Schema::create('editoras', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 80);
            $table->string('sigla', 25);
            $table->string('imagem', 100)->comment('Logo da editora');
            $table->string('cidade', 50);
            $table->string('uf', 2);
            $table->string('pais', 40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editoras');
    }
};