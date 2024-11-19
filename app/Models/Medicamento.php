<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $table = 'medicamentos'; //Nombre de la tabla

    //Definir los campos
    protected $fillable =[
        'descripcion',
        'id_inventario',
        'id_expediente',
        'cantidad',
        'fecha_entrega'
    ];
}
