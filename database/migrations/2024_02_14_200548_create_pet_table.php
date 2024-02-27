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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('1era_comidad')->nullable();
            $table->string('2da_comidad')->nullable();
            $table->string('3era_comidad')->nullable();
            $table->string('4ta_comidad')->nullable();
            $table->string('actitud');
            $table->integer('cant_medicamento')->nullable();
            $table->string('comidas_al_dia')->nullable();
            $table->string('dormir')->nullable();
            $table->string('edad');
            $table->string('fecha_nac');
            $table->string('foto');
            $table->string('indicaciones_de_Comida')->nullable();
            $table->text('info_adicional')->nullable();
            $table->string('miedos')->nullable();
            $table->string('muerde');
            $table->string('nombre');
            $table->string('apellido');
            $table->decimal('peso');
            $table->string('porción_de_comida')->nullable();
            $table->decimal('precio_especial', 10, 2)->unsigned()->nullable();
            $table->decimal('precio_feriado', 10, 2)->unsigned()->nullable();
            $table->decimal('precio_hotel', 10, 2)->unsigned()->nullable();
            $table->decimal('precio _tratamiento_día', 10, 2)->unsigned()->nullable();
            $table->string('raza')->nullable();
            $table->string('sexo')->nullable();
            $table->string('socializa');
            $table->string('solo_en_casa')->nullable();
            $table->string('solo_en_casa_descripcion')->nullable();
            $table->string('size');
            $table->string('tiene_tratamiento_medico')->nullable();
            $table->string('tipo_de_comida')->nullable();
            $table->string('tratamiento_medico')->nullable();
            $table->string('vacuna_vencida')->nullable();
            $table->string('vacunacion_antirrabica')->nullable();
            $table->string('vacunacion_influenza')->nullable();
            $table->string('vacunacion_tos')->nullable();
            $table->string('vacunacion_fotos')->nullable();
            $table->string('vencimiento_antirrabica')->nullable();
            $table->string('vencimiento_influenza')->nullable();
            $table->string('vencimiento_tos')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
