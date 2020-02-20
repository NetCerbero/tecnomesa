<?php

namespace App\Http\Controllers;

use App\TribunalEvaluacion;
use Illuminate\Http\Request;
use App\Graduacion;
use App\User;
use App\Evaluacion;
use App\Estadistica;

class TribunalEvaluacionController extends Controller
{
    private $id = 8;

    public function estadisticas(){
        $est = Estadistica::find($this->id);
        $est->visto = $est->visto + 1;
        $est->save();
        return $est->visto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graduaciones = Graduacion::all()->whereIn('tipo',[2,3]);
        $contador = $this->estadisticas();
        return view('asignacion.index',compact('graduaciones','contador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('asignacion.create');
    }

    public function evaluacion($id){
        $tribunales = User::all()->where('tipo','2');
        $graduacion = Graduacion::find($id);
        $contador = $this->estadisticas();
        return view('asignacion.create',compact('id','tribunales','graduacion','contador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        if($request['tipo'] == 2){
            $evaluacion = Evaluacion::create([
                'tipo' => $request['tipo'],
                'finicio' => $request['finicio'],
                'fdefensa' => $request['fdefensa'],
                'graduacion_id' => $request['graduacion_id']
            ]);
        }else{
            $evaluacion = Evaluacion::create([
                'tipo' => $request['tipo'],
                'finicio' => $request['finicio'],
                'ffinal' => $request['ffinal'],
                'fdefensa' => $request['fdefensa'],
                'nresolucion' => $request['nresolucion'],
                'graduacion_id' => $request['graduacion_id']
            ]);
        }

        foreach ($request['tribunal_id'] as $key => $value) {
            $evaluacion->tribunal()->syncWithoutDetaching(
                [
                    $key => $value
                ]
            );
        }
        $this->estadisticas();
        return redirect()->route('asignacion.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TribunalEvaluacion  $tribunalEvaluacion
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $graduacion = Graduacion::find($id);
        $contador = $this->estadisticas();
        return view('asignacion.show',compact('graduacion','contador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TribunalEvaluacion  $tribunalEvaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluacion = Evaluacion::find($id);
        $tribunales = User::all()->where('tipo','2');
        $contador = $this->estadisticas();
        return view('asignacion.edit',compact('evaluacion','tribunales','contador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TribunalEvaluacion  $tribunalEvaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $evaluacion = Evaluacion::find($id);
        if($request['tipo'] == 2){
            $evaluacion->update([
                'tipo' => $request['tipo'],
                'finicio' => $request['finicio'],
                'fdefensa' => $request['fdefensa']
            ]);
        }else{
            $evaluacion->update([
                'tipo' => $request['tipo'],
                'finicio' => $request['finicio'],
                'ffinal' => $request['ffinal'],
                'fdefensa' => $request['fdefensa'],
                'nresolucion' => $request['nresolucion']
            ]);
        }

        foreach ($request['tribunal_id'] as $key => $value) {
            $evaluacion->tribunal()->syncWithoutDetaching(
                [
                    $key => $value
                ]
            );
        }
        $this->estadisticas();
        return redirect()->route('asignacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TribunalEvaluacion  $tribunalEvaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TribunalEvaluacion $tribunalEvaluacion)
    {
        $this->estadisticas();
    }
}
