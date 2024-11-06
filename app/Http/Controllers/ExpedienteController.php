<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\ConsultaMail;
use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Models\Paciente;
use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Pago;

class ExpedienteController extends Controller
{
    public function ver_expediente(){
        $usuario = auth()->user();
        $nombre = $usuario->name;
        //return $nombre;
        $expedientes = Expediente::where('usuario', $nombre)
        ->get();
        return view('expedientes.ver_expediente',compact('expedientes'));
}
public function crear_expediente(Request $request){
    //return $request->all();
    // Crear un nuevo expediente con eloquent
        $paciente = Expediente::create([
        'numero' => $request->numero,
        'anho' => $request->anho,
        'descripcion' => $request->descripcion,
        'hospital' => $request->hospital,
        'doctor' => $request->doctor,
        'estado' => $request->estado,
        'id_pacientes' => $request->id_pacientes,
        'usuario' => $request->usuario
    ]);

// Redirigir a la ruta ver_clientes con un mensaje de éxito
return redirect()->route('ver_expediente')->with('success', 'Paciente creado correctamente');
}
public function ver_formulario(){
    $pacientes =Paciente::pluck('nombre','id');
   // return $pacientes;
    return view('expedientes.formulario',compact('pacientes'));
}
public function detalles($id){
    $expedientes =Expediente::with('pacientes')
    ->where('id',$id)
    ->firstOrFail();
    //return $expedientes;
        
    $consultas = Consulta::with('expedientes')
    ->where('id_expediente',$id)
    ->get();

    $pagos = Pago::with('expedientes')
    ->where('id_expediente',$id)
    ->get();
    //return $consultas;
    return view('expedientes.detalles',compact('pagos','expedientes','consultas'));
    }
    public function guardar_consulta(Request $request){
       //return $request->all();
        $consulta = Consulta::create([
            'sintomas' => $request->sintomas,
            'descripcion' => $request->descripcion,
            'tipo_consulta' => $request->tipo_consulta,
            'fecha' => $request->fecha,
            'receta' => $request->receta,
            'estado' => $request->estado,
            'id_expediente' => $request->id_expediente,
        ]);
       // Mail::to('rep141998@gmail.com')->send(new ConsultaMail($consulta));
        return redirect()->back()->with('success', 'Datos guardados correctamente.');

    }
    public function guardar_pagos(Request $request){
        //return $request->all();
         $consulta = Pago::create([
             'descripcion' => $request->descripcion,
             'tipo_consulta' => $request->tipo_consulta,
             'metodo_pago' => $request->metodo_pago,
             'monto' => $request->monto,
             'fecha_pago' => $request->fecha_pago,
             'estado' => $request->estado,
             'id_expediente' => $request->id_expediente,
         ]);
         return redirect()->back()->with('success', 'Datos guardados correctamente.');
 
     }
     public function pdf($id){
        $expedientes =Expediente::with('pacientes')
        ->where('id',$id)
        ->firstOrFail();
        //return $expedientes;
            
        $consultas = Consulta::with('expedientes')
        ->where('id_expediente',$id)
        ->get();
      $pdf =Pdf::loadView('expedientes.pdf',compact('expedientes','consultas'));
      return  $pdf->download('Expediente_'.$id. '.pdf');
        }
}
