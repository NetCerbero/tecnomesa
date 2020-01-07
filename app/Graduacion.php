<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Graduacion extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'tipo','forma','nota','fsorteoarea','area_id','fpresentacion','titulo','guia_id','egresado_id'
    ];


    public function avanceProyecto(){
        return $this->hasMany('App\AvanceProyecto','trabajo_id','id');
    }

    public function evaluacion(){

    }

    public function egresado(){
         return $this->belongsTo('App\User','egresado_id');
    }

    public function tutor(){
        return $this->belongsTo('App\User','guia_id');
    }

    public function area(){
        return $this->belongsTo('App\Area','area_id');
    }

}
