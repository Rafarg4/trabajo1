<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Cliente;
class ClienteController extends Controller
{
    public function CrearCliente(Request $request){

        //Validacion
        $validacion =[
                'nombre' => 'required|string|max:22',
                'apellido' => 'required|string|max:22',
                'documento' => 'required|unique:clientes,documento|max:20',
                'telefono' => 'required|string|max:22',
                'direccion' => 'required|string|max:22',
                'activo'=> 'requried|boolean'
                
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
    $cliente = Cliente::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'documento' => $request->documento,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
        'activo' => $request->estado,
    ]);

    // Redirigir a la ruta ver_clientes con un mensaje de éxito
    return redirect()->route('ver_clientes')->with('success', 'Cliente creado correctamente');
    }
    public function desactivar($id){
        Cliente::where('id',$id)->update(['activo' =>0]);
        return redirect()->back()->with('success', 'El cliente ha sido desactivado exitosamente.');
    }
    public function ver_formulario(){
            return view('clientes.formulario');
    }
    //Funcion para ver todo con filtros
    public function ver_clientes(Request $request){
        $buscar = $request->input('buscar');
        if($buscar !=null){
        $clientes =Cliente::where('activo','!=',null)
        ->where('documento',$buscar)
        ->orderBy('nombre','desc')
        ->paginate(5);
        return view('clientes.index',compact('clientes'));
        }else{
        $clientes =Cliente::where('activo','!=',null)
        ->orderBy('nombre','desc')
        ->paginate(5);
        }
       return view('clientes.index',compact('clientes'));
    }
    //Funcion para ver por id
    public function show_cliente ($id){
        $clientes = Cliente::select('id','documento','nombre','apellido','activo')
        ->where('id',$id)
        ->get();
        return response()->json(['message'=>'Cliente buscado es:','clientes' =>$clientes]);
    }
    public function delete_cliente(){
        $clientes = Cliente::where('id','1')
        ->first();
        if($clientes->activo == 1){
            return response()->json(['message' => 'Cliente no se puede eliminar']);
        }else{
        $clientes->delete();
        return response()->json(['message' => 'Cliente eliminado correctamente']);
     }
    }
    public function update_cliente(Request $request, $id){
        $clientes = Cliente::where('id',$id);
        $clientes ->update([
        'nombre'=>$request->nombre,
        'apellido'=>$request->apellido,
        'documento'=>$request->documento,
        'telefono'=>$request->telefono,
        'direccion'=>$request->direccion,
        'activo'=>$request->activo,
        ]);
        return redirect()->route('ver_clientes')->with('success', 'Cliente actualizado correctamente');
    }
}
