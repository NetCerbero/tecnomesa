<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cu extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 'icon', 'paquete_id'
    ];

    public function rol(){
        return $this->belongsToMany('App\Rol','permiso','cu_id','rol_id')->withPivot('rol_id', 'cu_id','leer','escribir','eliminar','editar')->withTimestamps();
    }

    public function paquete(){
    	return $this->hasOne('App\Paquete', 'id','paquete_id');
    }

    public function estadistica(){
        return $this->hasOne('App\Estadistica','cu_id');
    }
}
