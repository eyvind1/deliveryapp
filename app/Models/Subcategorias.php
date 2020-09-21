<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title', 'description', 'nombre', 'descripcion', 'urlfoto', 'visitas', 'orden', 'categorias_id',
    ];

    public function categorias(){
        return $this->belongsTo("App\Models\Categorias");
    }

    public function productos(){
        return $this->hasMany("App\Models\Productos");
    }
}
