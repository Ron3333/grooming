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
        Schema::create('grooming', function (Blueprint $table) {
            $table->id();
            $table->string('cancelado');
            $table->string('cobro_multiple');
            $table->string('comprobante_2do_pago')->nullable();
            $table->string('comprobante_deposito')->nullable();
            $table->string('depósito_validado');
            $table->unsignedBigInteger('user_id');
            $table->string('fecha');
            $table->string('fecha_texto');
            $table->string('fotos_resultado')->nullable();
            $table->decimal('monto_2do_pago', 10, 2)->unsigned()->nullable();
            $table->decimal('monto_depósito_inicial', 10, 2)->unsigned()->nullable();
            $table->string('nudos');
            $table->text('observaciones');
            $table->text('otros_conceptos')->nullable();
            $table->string('pago_en_efectivo');
            $table->unsignedBigInteger('pet_id')->nullable();
            $table->decimal('precio_grooming', 10, 2);
            $table->decimal('precio_comportamiento', 10, 2)->unsigned()->nullable();
            $table->decimal('precio_nudos', 10, 2)->unsigned()->nullable();
            $table->decimal('precio_otros_conceptos', 10, 2)->unsigned()->nullable();
            $table->decimal('precio_total', 10, 2)->unsigned()->nullable();
            $table->decimal('precio_tratamiento', 10, 2)->unsigned()->nullable();
            $table->decimal('propina', 10, 2)->unsigned()->nullable();
            $table->string('realizado');
            $table->string('solicitar_pago');
            $table->string('tipo_de_grooming');
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grooming');
    }
};
