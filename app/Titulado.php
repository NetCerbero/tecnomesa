<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Titulado extends Model
{
	use SoftDeletes;

    protected $fillable = ['anio_titulacion','egresado_id'];

    public function egresado(){
    	return $this->hasOne('App\User', 'id','egresado_id');
    }
}
