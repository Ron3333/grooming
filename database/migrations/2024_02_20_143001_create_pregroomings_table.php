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
        Schema::create('pregroomings', function (Blueprint $table) {
            $table->id();
            $table->decimal('depósito_inicial', 10, 2);
            $table->string('fecha');
            $table->string('fecha_texto');
            $table->string('nudos');
            $table->text('observaciones');
            $table->string('perro');
            $table->string('foto');
            $table->string('tipo_groming');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pet_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregroomings');
    }
};

