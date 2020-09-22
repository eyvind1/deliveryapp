<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad', 'productos_id', 'pedidos_id', 
    ];

    public function pedidos(){
        return $this->belongsTo("App\Models\Pedidos");
    }

    public function productos(){
        return $this->belongsTo("App\Models\Productos");
    }
}
