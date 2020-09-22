<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portadas;

class PortadasController extends Controller
{
    public function index()
    {
        $portadas = Portadas::all();
        return view("admin.portadas.index",compact('portadas'));
    }

    
    public function create()
    {
        return view("admin.portadas.create");
    }

    
    public function store(Request $request)
    {
        $portada = new Portadas($request->all());
        if($request->hasFile('urlfoto')):
            $urlfoto = $request->file('urlfoto');
            $ruta = public_path('/img/portadas/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(),$ruta);
            $portada->urlfoto = $request->file('urlfoto')->getClientOriginalName();
        endif;
        $portada->save();
        return redirect()->route('admin.portadas.index');
    }

    
    public function edit($id)
    {
        $portada = Portadas::whereId($id)->first();
        return view("admin.portadas.edit",compact('portada'));
    }

    
    public function update(Request $request, $id)
    {
        $portada = Portadas::findOrFail($id);

        $portada->fill($request->all());
        if($request->hasFile('urlfoto')):
            $urlfoto = $request->file('urlfoto');
            $ruta = public_path('/img/portadas/'.$request->file('urlfoto')->getClientOriginalName());
            copy($urlfoto->getRealPath(),$ruta);
            //añadir eliminar url de la foto antigua
            $portada->urlfoto = $request->file('urlfoto')->getClientOriginalName();
        endif;
        $portada->save();
        return redirect()->route('admin.portadas.index');
    }

    
    public function destroy($id)
    {
        $portada = Portadas::findOrFail($id);
        if(file_exists(public_path('/img/portadas/'.$portada->urlfoto) ))
            unlink(public_path('/img/portadas/'.$portada->urlfoto));
        $portada->delete();
        return redirect()->route('admin.portadas.index');
    }
}
