<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
    	'funcion','conocimiento','tecnologia','nivel_id','empresa_id','area_id','titulado_id'
    ];

    public function titulado(){
    	return $this->hasOne('App\Titulado', 'id','titulado_id');
    }

    public function empresa(){
    	return $this->hasOne('App\Empresa','id','empresa_id');
    }

    public function nivelPuesto(){
    	return $this->hasOne('App\NivelPuesto', 'id','nivel_id');
    }

    public function area(){
    	return $this->hasOne('App\Area', 'id','area_id');
    }
}
