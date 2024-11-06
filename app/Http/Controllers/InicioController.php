<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){
        $datos=[
            'mensaje' =>"¡Hola, Mundo!",
            'titulo' => "Pagina de Bienvenida",
            'materias'=>['BD1','LP2','DW3','R1']
        ];
        //Opcion 1con compact
        //return $datos;
        return view('trabajos.index',$datos);
        //Opcion 2 con with
        //return view('trabajos.index')->with('mensaje',$mensaje);
    }
}
