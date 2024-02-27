<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;


class Grooming extends Model
{
    use HasFactory;

    protected $table = 'grooming';
   

    protected $fillable = [
        'Cancelado',
        'cobro_multiple',
        'comprobante_2do_pago',
        'comprobante_deposito',
        'depósito_validado',
        'fecha',
        'fecha_texto',
        'fotos_resultado',
        'monto_2do_pago',
        'monto_depósito_inicial',
        'nudos',
        'observaciones',
        'otros_conceptos',
        'pago_en_efectivo',
        'precio_grooming',
        'precio_comportamiento',
        'precio_nudos',
        'precio_otros_conceptos',
        'precio_total',
        'precio_tratamiento',
        'propina',
        'realizado',
        'tipo_de_grooming',     
    ];

    public function pet(): BelongsTo
        {
            return $this->belongsTo(Pet::class);
        }

    public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

}
