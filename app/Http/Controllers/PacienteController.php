<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Mail\PacienteCreadoMail;
use Illuminate\Support\Facades\Mail;
class PacienteController extends Controller
{
    public function ver_pacientes(){
        $pacientes = Paciente::all();
        return view('pacientes.ver_paciente',compact('pacientes'));
}
public function crear_paciente(Request $request){

    //Validacion
    $validacion =[
            'nombre' => 'required|string|max:22',
            'apellido' => 'required|string|max:22',
            'documento' => 'required|unique:clientes,documento|max:20',
            'telefono' => 'required|string|max:22',
            'direccion' => 'required|string|max:22',
            'estado'=> 'required'
            
        ];
    //Mensajes personalizados
        $mensaje =[
            'nombre.required'=> 'El campo nombre es obligatorio',
            'documento.unique' => 'El  numero de documento ya esta registrado',
            'documento.required' => 'El campo documento es obligatorio'
        ];
    //Validar datos
    $validar_datos= $request->validate($validacion,$mensaje);
    // Crear un nuevo cliente con eloquent
        $paciente = Paciente::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'documento' => $request->documento,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
        'estado' => $request->estado,
    ]);

     // Enviar correo
     Mail::to('rep141998@gmail.com')->send(new PacienteCreadoMail($paciente));

     // Retornar respuesta en JSON
     return response()->json(['mensaje' => 'Paciente creado exitosamente', 'paciente' => $paciente], 201);
// Redirigir a la ruta ver_clientes con un mensaje de éxito
}
public function ver_formulario(){
    return view('pacientes.formulario');
}
}
