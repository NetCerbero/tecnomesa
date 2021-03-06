<?php

namespace App\Http\Controllers;

use App\Graduacion;
use App\Area;
use App\User;
use Illuminate\Http\Request;
use App\Estadistica;

class GraduacionController extends Controller
{
    private $id = 6;
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
        $graduaciones = Graduacion::all();
        $contador = $this->estadisticas();
        return view('graduacion.index',compact('graduaciones','contador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all()->where('tipo','1');
        $tutores = User::all()->where('tipo','3');
        $contador = $this->estadisticas();
        return view('graduacion.create',compact('areas','tutores', 'contador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['tipo'] == 1){
            Graduacion::create([
                'forma' => $request['forma'],
                'nota' => $request['nota'],
                'egresado_id' => $request['egresado_id'],
                'tipo' => $request['tipo']
            ]);
        }else if($request['tipo'] == 2){
            Graduacion::create([
                'fsorteoarea' => $request['fsorteoarea'],
                'area_id' => $request['area_id'],
                'egresado_id' => $request['egresado_id'],
                'tipo' => $request['tipo']
            ]);
        }else if($request['tipo'] == 3){
            Graduacion::create([
                'fpresentacion' => $request['fpresentacion'],
                'titulo' => $request['titulo'],
                'guia_id' => $request['guia_id'],
                'area_id' => $request['area_id'],
                'egresado_id'=> $request['egresado_id'],
                'tipo' => $request['tipo']
            ]);
        }
        $this->estadisticas();
        return redirect()->route('egresado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Graduacion  $graduacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $graduacion = Graduacion::findOrFail($id);
        $contador = $this->estadisticas();
        return view('graduacion.show',compact('graduacion','contador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Graduacion  $graduacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $graduacion = Graduacion::find($id);
        $areas = Area::all()->where('tipo','1');
        $tutores = User::all()->where('tipo','3');
        $contador = $this->estadisticas();
        return view('graduacion.edit',compact('graduacion','areas','tutores','contador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Graduacion  $graduacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $graduacion = Graduacion::find($id);
        $graduacion->update($request->all());
        $this->estadisticas();
        return redirect()->route('egresado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Graduacion  $graduacion
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Graduacion::destroy($id);
        $this->estadisticas();
        return redirect()->route('egresado.index');
    }

    public function getInfoUser($reg){
        $rsp = [];
        $user = User::where('registro', '=', $reg)->first();
        if ($user === null) {
            $rsp['estado'] = false;
            $rsp['mensaje'] = "Debe registrar antes al egresado como usuario";
            // .' <a href="'.route('usuario.create').'">dele click aqui</a>'
        }else{
            $data = $user->userDataUagrm($reg);
            if(is_array($data)){
                $rsp['nombre'] = $data['datos']['nombre'];
                $rsp['genero'] = $data['datos']['sexo'];
                $rsp['estado'] = true;
                $rsp['id'] = $user->id;
                $rsp['sem_ingreso'] = $data['carrera']['sem_ingreso'];
                $rsp['anio_ingreso'] = $data['carrera']['ano_ingreso'];
                $rsp['sem_postulacion'] = $data['materia_titulacion']['sem'];
                $rsp['anio_postulacion'] = $data['materia_titulacion']['ano'];
            }else{
                $rsp['estado'] = false;
                $rsp['mensaje'] = $data;
            }
        }


        return $rsp;
    }
}
