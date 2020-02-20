<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use App\Rol;
use App\Estadistica;

class UserController extends Controller
{
    private $id = 1;

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
        $users = User::all();
        $contador = $this->estadisticas();
        return view('usuario.index',compact('users','contador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::all();
        $contador = $this->estadisticas();
        return view('usuario.create', compact('roles','contador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['password'] = Hash::make($request->password);
        User::create($request->all());
        $this->estadisticas();
        return redirect()->route('usuario.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $contador = $this->estadisticas();
        return view('usuario.show', compact('user','contador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Rol::all();
        $contador = $this->estadisticas();
        return view('usuario.edit', compact('user','roles','contador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user -> update($request->all());
        $this->estadisticas();
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        $this->estadisticas();
        return redirect()->route('usuario.index');
    }

    public function getUserData($reg){
        $data = Auth::user()->userDataUagrm($reg);
        $rsp = [];
        if(is_array($data)){
            $rsp['nombre'] = $data['datos']['nombre'];
            $rsp['genero'] = $data['datos']['sexo'];
            $rsp['estado'] = true;
        }else{
            $rsp['estado'] = false;
            $rsp['mensaje'] = $data;
        }

        return $rsp;
    }
}
