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

    }

    public function evaluacion(){

    }

    public function user(){
    	
    }

}
