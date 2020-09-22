<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detalles;
use Session;

class DetallesController extends Controller
{
    public function index(){

        if(!empty(Session::get('pedidos_id'))){
            $detalles = Detalles::wherePedidos_id(Session::get('pedidos_id'))->get();
            return view("admin.detalles.index",compact('detalles'));
        }
    }
    
}
