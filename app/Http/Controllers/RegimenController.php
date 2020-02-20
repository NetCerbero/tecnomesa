<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Regimen;
use App\Estadistica;

class RegimenController extends Controller
{
    private $id = 3;

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
        $regimenes = Regimen::all();
        $contador = $this->estadisticas();
        return view('regimen.index',compact('regimenes','contador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->estadisticas();
        return view('regimen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Regimen::create($request->all());
        $this->estadisticas();
        return redirect()->route('regimen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Regimen  $regimen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regimen = Regimen::find($id);
        $contador = $this->estadisticas();
        return view('regimen.edit', compact('regimen','contador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Regimen  $regimen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regimen = Regimen::find($id);
        $contador = $this->estadisticas();
        return view('regimen.edit', compact('regimen','contador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Regimen  $regimen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regimen = Regimen::find($id);
        $regimen->update($request->all());
        $this->estadisticas();
        return redirect()->route('regimen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regimen  $regimen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Regimen::destroy($id);
        $this->estadisticas();
        return redirect()->route('regimen.index');
    }
}
