<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title', 'description', 'nombre', 'descripcion', 'precio', 'unidad', 'stock', 'urlfoto', 'visitas', 'orden', 'estado','subcategorias_id',
    ];

    public function subcategorias(){
        return $this->belongsTo("App\Models\Subcategorias");
    }
}
