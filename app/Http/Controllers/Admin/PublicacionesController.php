<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publicaciones;
use App\Models\Categorias;

class PublicacionesController extends Controller
{
    public function index()
    {
        $publicaciones = Publicaciones::all();
        return view("admin.publicaciones.index",compact('publicaciones'));
    }

    public function create()
    {
        $categorias = Categorias::orderBy('nombre','asc')->pluck('nombre','id');
        return view("admin.publicaciones.create",compact("categorias"));
    }

    
    public function store(Request $request)
    {
        $publicacion = new Publicaciones($request->all());
        if($request->hasFile('urlfoto')):
            $urlfoto = $request->file('urlfoto');
            $ruta = public_path('/img/publicaciones/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(),$ruta);
            $publicacion->urlfoto = $request->file('urlfoto')->getClientOriginalName();
        endif;
        $publicacion->save();
        return redirect()->route('admin.publicaciones.index');
    }

    
    public function show($id)
    {
        Session::put('categorias_id',$id);
        return redirect('/admin/subcategorias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categorias::whereId($id)->first();
        return view("admin.categorias.edit",compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categorias::findOrFail($id);

        $categoria->fill($request->all());
        if($request->hasFile('urlfoto')):
            $urlfoto = $request->file('urlfoto');
            $ruta = public_path('/img/categorias/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(),$ruta);
            //añadir eliminar url de la foto antigua
            $categoria->urlfoto = $request->file('urlfoto')->getClientOriginalName();
        endif;
        if($request->portada)
            $categoria->portada = 1;
        else
            $categoria->portada = 0;
        $categoria->save();
        return redirect()->route('admin.categorias.index');
    }

    
    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);
        //eliminar la foto
        $categoria->delete();
        return redirect()->route('admin.categorias.index');
    }
}
