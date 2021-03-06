<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portadas;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Subcategorias;
use App\Models\Publicaciones;

class FrontController extends Controller
{
    public function index(){
        $portadas = Portadas::all();
        $productos = Productos::orderBy('visitas','desc')->take(3)->get(['slug','nombre','precio','urlfoto']);
        return view('welcome',compact('portadas','productos'));
    }

    public function categoria($categoria){
        $categoria = Categorias::whereSlug($categoria)->first();
        $productos = Productos::whereHas('subcategorias.categorias',function($query) use($categoria){
            $query->where('id',$categoria->id);
        })->get();
        return view('front.categoria',compact('categoria','productos'));
    }

    public function subcategoria($categoria, $subcategoria){
        $subcategoria = Subcategorias::whereSlug($subcategoria)->first();
        
        return view('front.subcategoria',compact('subcategoria'));
    }

    public function producto($producto){
        $producto = Productos::whereSlug($producto)->first();
        $productos = Productos::whereSubcategorias_id($producto->subcategorias_id);
        return view('front.producto',compact('producto','productos'));
    }

    public function publicacion($slug){
        $publicacion = Publicaciones::whereSlug($slug)->first();
        $publicacion->increment('visitas');
        return view('front.publicacion',compact('publicacion'));
    }
}
