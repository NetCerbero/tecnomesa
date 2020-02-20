<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
	use SoftDeletes;
    protected $fillable = [
        'nombre', 'icon'
    ];

    public function cu(){
        return $this->belongsToMany('App\Cu','permiso','rol_id','cu_id')->withPivot('rol_id', 'cu_id','leer','escribir','eliminar','editar')->withTimestamps();
    }

}
