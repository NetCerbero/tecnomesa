<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use Illuminate\Http\Request;
use Auth;
use App\User;
class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargo = Auth::user()->rol_id;
        if($cargo == 4){
            $evaluaciones = Evaluacion::all();
        }else{
            $user = User::find(Auth::user()->id);
            $evaluaciones = $user->evaluacion;
        }
        $rsp = [];
        foreach ($evaluaciones as $key => $eva) {
            $data = [];
            $notaEscrita = 0;
            $notaOral = 0;
            $cantidad = 0;
            foreach ($eva->tribunal as $value) {
                $data['tribunal'][] =  $value->nombre.' '.$value->apellido.' - '.$value->registro;

                if ($value->pivot->eva1 ) {
                    $data['evaluacion'][] = $value->pivot->eva1. ' - '. $value->pivot->eva2;
                    if(!$value->pivot->eva2){
                        $nota = $nota + ($value->pivot->eva1 + $value->pivot->eva2)/2;
                    }else{
                        $nota = $value->pivot->eva1;
                    }

                }else{
                    $data['evaluacion'][] = 'Aun no ingresado la nota';
                }
                
                if ($value->pivot->oral) {
                    $data['oral'][] =  $value->pivot->oral;
                    $notaOral = $notaOral + $value->pivot->oral;
                }else{
                    $data['oral'][] = 'Aun no ingreso la nota';
                }
                
                if ($value->pivot->observacion) {
                   $data['observacion'][] = $value->pivot->observacion;
                }else{
                    $data['observacion'][] = '-----';
                }
                
            }
            $final = 0;
            if ($eva->tipo == 2) {
                $data['tipo'] = 'Examen de grado';
                $final = ($notaEscrita/2 )*0.6+$notaOral * 0.4;
            }else{
                $data['tipo'] = 'Trabajo dirigido/Tesis';
                $final = ($notaEscrita/3 )*0.6+$notaOral * 0.4;
            }

            $uagrm = Auth::user()->userDataUagrm($eva->graduacion->egresado->registro);
            $data['egresado'] = $uagrm['datos']['nombre'].' - '.$eva->graduacion->egresado->registro;
            if($eva->graduacion->titulo){
                $data['titulo'] = $eva->graduacion->titulo;
            }else{
                $data['titulo'] = "----";
            }
            
            $data['final'] = $final; 
            $data['id'] = $eva->id;
            $rsp[] = $data;
        }
        return view('evaluacion.index',compact('rsp'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function crear($id){
        //$evaluacion = Evaluacion::find($id);
        $evaluacion = Evaluacion::find($id);
        return view('evaluacion.create',compact('id','evaluacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $evaluacion = Evaluacion::find($request['id']);
        foreach ($evaluacion->tribunal as $value) {
            if ($value->pivot->tribunal_id == Auth::user()->id) {
                if ($evaluacion->tipo == 2) {
                    $evaluacion->tribunal()->syncWithoutDetaching([
                        Auth::user()->id => [
                            'eva1' => $request['eva1'],
                            'oral' => $request['oral']
                        ]
                    ]);
                }else{
                    $evaluacion->tribunal()->syncWithoutDetaching([
                        Auth::user()->id => [
                            'eva1' => $request['eva1'],
                            'eva2' => $request['eva2'],
                            'observacion' => $request['observacion'],
                            'oral' => $request['oral'],
                        ]
                    ]);
                }
                
            }
        }
        return redirect()->route('evaluacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluacion $evaluacion)
    {
        //
    }
}
