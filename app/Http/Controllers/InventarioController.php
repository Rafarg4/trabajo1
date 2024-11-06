<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
class InventarioController extends Controller
{
    public function ver_inventario(){
        $inventario = Inventario::all();
        return view ('inventarios.ver_inventario',compact('inventario'));
    }
}
