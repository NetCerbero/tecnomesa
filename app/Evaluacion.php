<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $fillable = [
    	'tipo','finicio','ffinal','fdefensa','nresolucion','graduacion_id'
    ];

    public function tribunal(){
    	return $this->belongsToMany('App\User','tribunal_evaluacions','evaluacion_id','tribunal_id')->withPivot('eva1','eva2','observacion','oral','tribunal_id','evaluacion_id')->withTimestamps();
    }

    public function graduacion(){
    	return $this->belongsTo('App\Graduacion','graduacion_id');
    }
}
