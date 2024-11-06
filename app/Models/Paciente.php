<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes'; //Nombre de la tabla

    //Definir los campos
    protected $fillable =[
        'nombre',
        'apellido',
        'documento',
        'telefono',
        'direccion',
        'estado',
    ];
    public function expedientes(){
        return $this->hasMany(Expediente::class);
    }
}
