<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use Illuminate\Support\Facades\DB;
class InventarioController extends Controller
{
    public function ver_inventario(){
        $inventario = Inventario::all();
        return view ('inventarios.ver_inventario',compact('inventario'));
    }
    public function cargar_inventario(){
        return view('inventarios.cargar_inventario');
    }
    public function crear_inventario(Request $request){
        //return $request->all();
        // Crear un nuevo expediente con eloquent
            $invnetario = Inventario::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'stock_minimo' => $request->stock_minimo,
            'estado' => $request->estado,
        ]);
    
    // Redirigir a la ruta ver_clientes con un mensaje de éxito
    return redirect()->route('ver_inventario')->with('success', 'Paciente creado correctamente');
    }
    public function reponer_stock(Request $request, $id){
        $cantidad = $request->input('cantidad');
        Inventario::where('id',$id)->increment('cantidad',$cantidad);

        $entradas = DB::table('entrada_medicamentos')->insert(
            [
                'id_medicamento' => $id,
                'cantidad'=>$request->cantidad,
                'created_at' => now(),
                'update_at' => now()
            ]
            );
        return redirect()->route('ver_inventario')->with('success', 'Reposicion creada');

    }
    public function entradas($id){

        $resultado =DB::table('entrada_medicamentos')
        ->join('inventarios','entrada_medicamentos.id_medicamento', '=','inventarios.id')
        ->select('entrada_medicamentos.id', 'inventarios.nombre','inventarios.descripcion',
        'entrada_medicamentos.created_at', 'entrada_medicamentos.id_medicamento',
        'entrada_medicamentos.cantidad')
        ->where('entrada_medicamentos.id_medicamento', $id)
        ->get();
      return view('inventarios.entradas',compact('resultado'));
    }
}
