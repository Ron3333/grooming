<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets';
 

    protected $fillable = [
        '1era_comidad',
        '2da_comidad',
        '3era_comidad',
        '4ta_comidad',
        'cant_medicamento',
        'comidas_al_dia',
        'dormir',
        'edad',
        'fecha_nac',
        'foto',
        'indicaciones_de_Comida',
        'info_adicional',
        'miedos',
        'muerde',
        'nombre',
        'apellido',
        'peso',
        'porción_de_comida',
        'precio_especial',
        'precio_feriado',
        'prcio_hotel',
        'precio_tratamiento_día',
        'raza',
        'sexo',
        'socializa',
        'solo_en_casa',
        'solo_en_casa_descripcion',
        'size',
        'tiene_tratamiento_medico',
        'tipo_de_comida',
        'tratamiento_medico',
        'vacuna_vencida',
        'vacunacion_antirrabica',
        'vacunacion_influenza',
        'vacunacion_tos',
        'vacunacion_fotos',
        'vencimiento_antirrabica',
        'vencimiento_influenza',
        'vencimiento_tos',
        'slug',
        
    ];

    public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
    
    public function grooming(): HasMany
    {
        return $this->hasMany(Grooming::class);
    }
}
