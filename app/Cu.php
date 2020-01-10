<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cu extends Model
{
    protected $fillable = [
        'nombre', 'icon', 'paquete_id'
    ];

    public function rol(){
        return $this->belongsToMany('App\Rol','permiso','cu_id','rol_id')->withPivot('rol_id', 'cu_id','leer','escribir','eliminar','editar')->withTimestamps();
    }

    public function paquete(){
    	return $this->hasOne('App\Paquete', 'id','paquete_id');
    }
}
