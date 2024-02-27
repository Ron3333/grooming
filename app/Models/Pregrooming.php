<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregrooming extends Model
{
    use HasFactory;

    protected $table = 'pregroomings';

    protected $fillable = [
        'depósito_inicial',
        'fecha',
        'nudos',
        'observaciones',
        'perro',
        'tipo_groming', 
        'foto', 
        'user_id',  
    ];

}
