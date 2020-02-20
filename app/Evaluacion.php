<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion extends Model
{
	use SoftDeletes;
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
