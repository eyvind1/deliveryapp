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

    

    public function edit($id)
    {
        $publicacion = Publicaciones::whereId($id)->first();
        $categorias = Categorias::orderBy('nombre','asc')->pluck('nombre','id');

        return view("admin.publicaciones.edit",compact('publicacion','categorias'));
    }

    public function update(Request $request, $id)
    {
        $publicacion = Publicaciones::findOrFail($id);

        $publicacion->fill($request->all());
        if($request->hasFile('urlfoto')):
            $urlfoto = $request->file('urlfoto');
            $ruta = public_path('/img/publicaciones/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(),$ruta);
            //añadir eliminar url de la foto antigua
            $publicacion->urlfoto = $request->file('urlfoto')->getClientOriginalName();
        endif;
        
        $publicacion->save();
        return redirect()->route('admin.publicaciones.index');
    }

    
    public function destroy($id)
    {
        $publicacion = Publicaciones::findOrFail($id);
        if(file_exists(public_path('/img/publicaciones/'.$publicacion->urlfoto) ))
            unlink(public_path('/img/publicaciones/'.$publicacion->urlfoto));
        $publicacion->delete();
        return redirect()->route('admin.publicaciones.index');
    }
}
