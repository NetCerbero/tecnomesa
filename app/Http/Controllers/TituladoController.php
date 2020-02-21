<?php

namespace App\Http\Controllers;

use App\Titulado;
use Illuminate\Http\Request;
use App\User;
use App\Estadistica;

class TituladoController extends Controller
{
    private $id = 10;

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
        $titulados = Titulado::all();
        $contador = $this->estadisticas();
        return view('titulado.index',compact('titulados','contador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $egresados = User::all()->where('tipo',1);
        $contador = $this->estadisticas();
        return view('titulado.create',compact('egresados','contador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Titulado::create($request->all());
        $this->estadisticas();
        return redirect()->route('titulado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Titulado  $titulado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $titulado = Titulado::findOrFail($id);
        $contador = $this->estadisticas();
        return view('titulado.show', compact('titulado','contador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Titulado  $titulado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulado = Titulado::find($id);
        $egresados = User::all()->where('tipo',1);
        $contador = $this->estadisticas();
        return view('titulado.edit',compact('titulado','egresado','contador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titulado  $titulado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $titulado = Titulado::find($id);
        $titulado->update($request->all());
        $this->estadisticas();
        return redirect()->route('titulado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Titulado  $titulado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Titulado::destroy($id);
        $this->estadisticas();
        return redirect()->route('titulado.index');
    }
}
