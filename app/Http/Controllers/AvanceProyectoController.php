<?php

namespace App\Http\Controllers;

use App\AvanceProyecto;
use App\Graduacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvanceProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graduaciones = Graduacion::all()->where('tipo','3');
        return view('avanceproyecto.index',compact('graduaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = Storage::putFile('public/avance', $request->file('file'));
            $data = $request->all();
            $data['file'] = $path;
            AvanceProyecto::create($data);
            return redirect()->route('avance.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AvanceProyecto  $avanceProyecto
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $graduacion = Graduacion::find($id);
        return view('avanceproyecto.show',compact('graduacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AvanceProyecto  $avanceProyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $graduacion = Graduacion::find($id);
        return view('avanceproyecto.create',compact('id','graduacion'));
    }

    public function revisar($id){
        $graduacion = Graduacion::find($id);
        return view('avanceproyecto.edit',compact('id','graduacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AvanceProyecto  $avanceProyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $avance = AvanceProyecto::find($id);
        $avance->update($request->all());

        return redirect()->route('avance.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AvanceProyecto  $avanceProyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //
    }

    // public function getDownload()
    // {
    //     //PDF file is stored under project/public/download/info.pdf
    //     $file= public_path(). "/download/info.pdf";

    //     $headers = array(
    //               'Content-Type: application/pdf',
    //             );

    //     return Response::download($file, 'filename.pdf', $headers);
    // }
}
