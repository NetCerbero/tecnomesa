<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;
use App\Estadistica;

class SectorController extends Controller
{
    private $id = 4;

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
        $sectores = Sector::all();
        $contador = $this->estadisticas();
        return view('sector.index',compact('sectores','contador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contador = $this->estadisticas();
        return view('sector.create',compact('contador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sector::create($request->all());
        $this->estadisticas();
        return redirect()->route('sector.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sector = Sector::FindOrFail($id);
        $contador = $this->estadisticas();
        return view ('sector.show',compact('sector','contador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector = Sector::find($id);
        $contador = $this->estadisticas();
        return view('sector.edit', compact('sector','contador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sector = Sector::find($id);
        $sector->update($request->all());
        $this->estadisticas();
        return redirect()->route('sector.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sector::destroy($id);
        $this->estadisticas();
        return redirect()->route('sector.index');
    }
}
