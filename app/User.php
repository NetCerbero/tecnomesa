<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GuzzleHttp\Client;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'telefono', 'foto', 'email',
        'password', 'registro', 'genero', 'tipo', 'rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function rol(){
         return $this->hasOne('App\Rol', 'id','rol_id');
    }

    public function menu(){
        $rsp = [];
        $cus = $this->rol->cu;
        foreach ($cus as $cu) {
            $paquete = $cu->paquete;
            // verificar los permisos para determinar si se muestra o no el paquete y el cu

            if($cu->pivot->escribir || $cu->pivot->leer || $cu->pivot->eliminar || $cu->pivot->editar){
                if(array_key_exists($paquete->nombre,$rsp)){
                    $rsp[$paquete->nombre]['cus'][] = $cu;
                }else{
                    $rsp[$paquete->nombre] = ['icon' => $paquete->icon, 'id' => $paquete->id, 'cus' => [$cu]];
                }
            }
        }
        return $rsp;
    }

    public function userDataUagrm($reg){
        $client = new Client([
                'base_uri' => "https://tiluchi.uagrm.edu.bo/",
                'sync'     => true,
        ]);

        $headers = [
            'apikey' => '734b2b111sdfefb61e30de3a7361e30de3a736e30de3a736a8af1c2a8af1c21734b2b111sdfefb61',
            'Accept'        => 'application/json',
        ];
        $response = $client->request('GET',"titulados/$reg/",[
                    'headers' => $headers
                ]);
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        return $data;
    }

    public function graduacion(){
        return $this->hasOne('App\User', 'egresado_id');
    }

    //tesis | trabajo dirigido
    public function trabajo(){
        return $this->hasMany('App\Graduacion','guia_id','id');
    }

    public function evaluacion(){
        return $this->belongsToMany('App\Evaluacion','tribunal_evaluacions','tribunal_id','evaluacion_id')->withPivot('eva1','eva2','observacion','oral','tribunal_id','evaluacion_id')->withTimestamps();
    }
}
