<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $fillable = [
        'nombre', 'icon'
    ];
}
