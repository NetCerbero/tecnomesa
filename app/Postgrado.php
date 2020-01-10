<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postgrado extends Model
{
    protected $fillable = [
    	'titulo','grado_id','titulado_id'
    ];

    public function gradoTitulo(){
    	return $this->hasOne('App\GradoAcademico', 'id','grado_id');
    }

    public function titulado(){
    	return $this->hasOne('App\Titulado', 'id','titulado_id');
    }
}
