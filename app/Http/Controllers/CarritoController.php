<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Productos;
use Auth;

class CarritoController extends Controller
{
    public function agregar(Request $request){
        $producto = Productos::find($request->id);
        Cart::add(
            $producto->id,
            $producto->nombre,
            $producto->precio,
            $request->quantity,
            array("unidad"=>$producto->unidad)
        );
        return back()->with('success',"$producto->nombre ! se ha agregado al carrito de ompra");
    }
}
