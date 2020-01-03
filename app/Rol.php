<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable = [
        'nombre', 'icon'
    ];

    public function cu(){
        return $this->belongsToMany('App\Cu','permiso','rol_id','cu_id')->withPivot('rol_id', 'cu_id','leer','escribir','eliminar','editar')->withTimestamps();
    }

}
