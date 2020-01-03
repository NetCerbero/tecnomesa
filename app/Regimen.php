<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regimen extends Model
{
    protected $fillable = ['tipo'];

    function empresa(){
    	return $this->hasMany('App\Empresa','regimen_id','id');
    }
}
