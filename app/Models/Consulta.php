<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $table = 'consultas'; //Nombre de la tabla

    //Definir los campos
    protected $fillable =[
        'sintomas',
        'descripcion',
        'tipo_consulta',
        'fecha',
        'receta',
        'estado',
        'id_expediente'
    ];
    public function expedientes(){
        return $this->belongsTo(Expediente::class,'id_expediente');
    }
}
