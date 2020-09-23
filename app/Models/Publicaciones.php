<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title', 'description', 'nombre', 'descripcion', 'urlfoto', 'visitas', 'orden', 'portada', 'categorias_id',
    ];
    
    public function categorias(){
        return $this->belongsTo("App\Models\Categorias");
    }
}
