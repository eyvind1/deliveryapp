<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'slug', 'title', 'description', 'nombre', 'descripcion', 'urlfoto', 'visitas', 'orden', 'portada',
    ];
    
    public function subcategorias(){
        return $this->hasMany("App\Models\Subcategorias");
    }

    public function publicaciones(){
        return $this->hasMany("App\Models\Publicaciones");
    }
}
