<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes'; //Nombre de la tabla

    //Definir los campos
    protected $fillable =[
        'nombre',
        'apellido',
        'documento',
        'telefono',
        'direccion',
        'activo',
    ];
}
