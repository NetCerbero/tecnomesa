<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
    	'nombre','telefono','direccion','sector_id','regimen_id'
    ];

    function sector(){
    	return $this->hasOne('App\Sector', 'id','sector_id');
    }

    function regimen(){
    	return $this->hasOne('App\Regimen', 'id','regimen_id');
    }
}
