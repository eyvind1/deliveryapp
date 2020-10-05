<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;

class JsonController extends Controller
{
    public function enviarproductos(){
        $productos = Productos::all(['id','nombre']);
        return response()->json($productos,200);
    }

    public function recibirpedido(Request $request){
        if(!emty($request)):
            //procesar y salvar en la bd en tabla pedidos yt detalles
            $data = ['success'=>true];
            return response()->json($data,200);
        else:
            $data = ['success'=>false];
            return response()->json($data,200);
        endif;
    }
}
