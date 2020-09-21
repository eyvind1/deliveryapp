<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use Session;

class ProductosController extends Controller
{
    public function index()
    {
        if(!empty(Session::get('subcategorias_id'))){
            $productos = Productos::whereSubcategorias_id(Session::get('subcategorias_id'))->get();
            return view("admin.productos.index",compact('productos'));
        }     
    }

    public function create()
    {
        return view("admin.productos.create");
    }

    public function store(Request $request)
    {
        $productos = new Productos($request->all());
        if($request->hasFile('urlfoto')):
            $urlfoto = $request->file('urlfoto');
            $ruta = public_path('/img/productos/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(),$ruta);
            $productos->urlfoto = $request->file('urlfoto')->getClientOriginalName();
        endif;
        $productos->subcategorias_id = Session::get('subcategorias_id');
        if($request->estado)
            $productos->estado = 1;
        else
            $productos->estado = 0;
        $productos->save();
        return redirect()->route('admin.productos.index');
    }

   
    public function edit($id)
    {
        $producto = Productos::whereId($id)->first();
        return view("admin.productos.edit",compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Productos::findOrFail($id);

        $producto->fill($request->all());
        if($request->hasFile('urlfoto')):
            $urlfoto = $request->file('urlfoto');
            $ruta = public_path('/img/productos/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(),$ruta);
            //añadir eliminar url de la foto antigua
            $producto->urlfoto = $request->file('urlfoto')->getClientOriginalName();
        endif;
        if($request->estado)
            $producto->estado = 1;
        else
            $producto->estado = 0;
        $producto->save();
        return redirect()->route('admin.productos.index');
    }

    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);
        if(file_exists(public_path('/img/productos/'.$producto->urlfoto) ))
            unlink(public_path('/img/productos/'.$producto->urlfoto));
        $producto->delete();
        return redirect()->route('admin.productos.index');
    }
}
