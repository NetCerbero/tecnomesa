<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use App\Rol;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('usuario.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::all();
        return view('usuario.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getUserData($reg){
        $client = new Client([
                'base_uri' => "https://tiluchi.uagrm.edu.bo/",
                'sync'     => true,
        ]);

        $headers = [
            'apikey' => '734b2b111sdfefb61e30de3a7361e30de3a736e30de3a736a8af1c2a8af1c21734b2b111sdfefb61',
            'Accept'        => 'application/json',
        ];
        $response = $client->request('GET',"titulados/$reg/",[
                    'headers' => $headers
                ]);
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);

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
