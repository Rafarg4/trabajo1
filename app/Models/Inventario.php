<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $table = 'inventarios'; //Nombre de la tabla

    //Definir los campos
    protected $fillable =[
        'nombre',
        'descripcion',
        'cantidad',
        'stock_minimo',
        'estado',
    ];
}
