<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    protected $table = 'expedientes'; //Nombre de la tabla

    //Definir los campos
    protected $fillable =[
        'numero',
        'anho',
        'descripcion',
        'estado',
        'hospital',
        'doctor',
        'id_pacientes',
        'usuario'
    ];

    public function pacientes(){
        return $this->belongsTo(Paciente::class,'id_pacientes');
    }
    public function consultas(){
        return $this->hasMany(Consulta::class,'id_pacientes');
    }

}
