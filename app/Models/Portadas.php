<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portadas extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'frase', 'link', 'urlfoto', 'orden', 
    ];
    
}
