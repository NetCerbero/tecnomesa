<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use App\Regimen;
use App\Sector;
use App\Estadistica;

class EmpresaController extends Controller
{
    private $id = 2;
    public function estadisticas(){
        $est = Estadistica::find($this->id);
        $est->visto = $est->visto + 1;
        $est->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        $this->estadisticas();
        return view('empresa.index',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::all();
        $regimenes = Regimen::all();
        $this->estadisticas();
        return view('empresa.create',compact('sectores','regimenes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Empresa::create($request->all());
        $this->estadisticas();
        return redirect()->route('empresa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);
        $this->estadisticas();
        return view('empresa.show',compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $sectores = Sector::all();
        $regimenes = Regimen::all();
        $this->estadisticas();
        return view('empresa.edit',compact('empresa','sectores','regimenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $empresa=Empresa::find($id);
        $empresa->update($request->all());
        $this->estadisticas();
        return redirect()->route('empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresa::destroy($id);
        $this->estadisticas();
        return redirect()->route('empresa.index');
    }
}
