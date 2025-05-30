<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $fillable = [
        'nombre',
        'precio_bs',
        'precio_usd',
        'tasa_cambio',
        'user_id',
    ];

}
