<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulado extends Model
{
    protected $fillable = ['anio_titulacion','egresado_id'];

    public function egresado(){
    	return $this->hasOne('App\User', 'id','egresado_id');
    }
}
