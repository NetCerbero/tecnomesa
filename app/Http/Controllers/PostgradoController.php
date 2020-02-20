<?php

namespace App\Http\Controllers;

use App\Postgrado;
use Illuminate\Http\Request;
use App\GradoAcademico;
use App\Titulado;
use App\Estadistica;

class PostgradoController extends Controller
{
    private $id = 11;

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

        $postgrados = Postgrado::all();
        $contador = $this->estadisticas();
        return view('postgrado.index',compact('postgrados','contador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados = GradoAcademico::all();
        $titulados = Titulado::all();
        $contador = $this->estadisticas();
        return view('postgrado.create',compact('grados','titulados','contador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Postgrado::create($request->all());
        $this->estadisticas();
        return redirect()->route('postgrado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function show(Postgrado $postgrado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function edit(Postgrado $postgrado)
    {
        $this->estadisticas();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postgrado $postgrado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postgrado $postgrado)
    {
        //
    }
}
