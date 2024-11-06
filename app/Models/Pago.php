<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos'; //Nombre de la tabla

    //Definir los campos
    protected $fillable =[
        'descripcion',
        'tipo_consulta',
        'monto',
        'metodo_pago',
        'fecha_pago',
        'estado',
        'id_expediente'
    ];
    public function expedientes(){
        return $this->belongsTo(Expediente::class,'id_expediente');
    }
}
