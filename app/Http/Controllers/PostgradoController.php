<?php

namespace App\Http\Controllers;

use App\Postgrado;
use Illuminate\Http\Request;
use App\GradoAcademico;
use App\Titulado;
class PostgradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $postgrados = Postgrado::all();
        return view('postgrado.index',compact('postgrados'));
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
        return view('postgrado.create',compact('grados','titulados'));
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
        //
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
