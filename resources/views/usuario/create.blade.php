@extends('template')
@section('style')
<style>
    .nota{
        font-size: 0.9em;
        color: #fd6a6a;
    }
    .buscador{
        width: 35vw;
        border-radius: 0.5em;
        border: 0.5px solid #00000026;
        line-height: 2.3em;
        padding-left: 0.9em;
    }
    .error-codigo{
        color: #ff0000a3;
        font-weight: bold;
        display: none;
    }
</style>
@endsection
@section('title')
<h2>Registro de estudiante</h2>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <!-- START card-->
        <div class="card card-default">
            <div class="card-header">Registro de Usuarios</div>
            <div class="card-body">
            <form method="POST" action="{{route('usuario.store')}}" >
                @csrf
                <div class="form-group mb-0">
                    <label style="display: block; margin-bottom: 0px">Registro: </label>
                    <span class="nota mt-0" style="display: block;">Nota: ingrese el registro y dele Buscar en caso de que sea egresado</span>
                    <input name="registro" id="registro" type="number" placeholder="Ingrese el código" class="buscador">
                    <a href="#!" onclick="getEgresados()" class="btn btn-secondary">Buscar</a>
                </div>
                <span class="error-codigo"></span>

                <div class="form-row mt-2">
                    <div class="form-group col-md-4 col-12 col-sm-6">
                    <label>Nombre: </label>
                    <input name="nombre" class="form-control input-block clear-input" type="text" placeholder="Ingrese el nombre">
                </div>

                <div class="form-group col-md-4 col-12 col-sm-6">
                    <label>Apellido: </label>
                    <input name="apellido" class="form-control input-block clear-input" type="text" placeholder="Ingrese el apellido">
                </div>

                <div class="form-group col-md-4 col-12 col-sm-6">
                    <label>Telefono: </label>
                    <input name="telefono" class="form-control clear-input" type="text" placeholder="Ingrese el número de telefono">
                </div>
                
                <div class="form-group col-md-4 col-12 col-sm-6">
                    <label>Genero: </label>
                    <select name="genero" id=""  class="form-control input-block clear-input">
                        <option value="">Elija el genero</option>
                        <option value="m">Masculino</option>
                        <option value="f">Femenino</option>
                    </select>
                </div>
                
                <div class="form-group col-md-4 col-12 col-sm-6">
                    <label>Email: </label>
                    <input name="email" class="form-control clear-input" type="email" placeholder="Ingrese el correo">
                </div>

                <div class="form-group col-md-4 col-12 col-sm-6">
                    <label>Contraseña: </label>
                    <input name="password" class="form-control clear-input" type="text" placeholder="Ingrese su contraseña">
                </div>

                <div class="form-group col-md-4 col-12 col-sm-6">
                    <label>Tipo de usuario: </label>
                    <select name="tipo" onchange="changeInterface()" id="tipo"  class="form-control clear-input">
                        <option value="">Elija el tipo</option>
                        <option value="1">Estudiante</option>
                        <option value="2">Tribunal</option>
                        <option value="3">Docente</option>
                        <option value="4">Administrador</option>
                    </select>
                </div>        

                <div class="form-group col-md-4 col-12 col-sm-6">
                    <label>Nombre del rol: </label>
                    <select name="rol_id" id=""  class="form-control clear-input">
                        <option value="">Elija el rol</option>
                        @foreach($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                </div>

                <div class="d-flex justify-content-end col-sm-12">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
            </div>
        </div><!-- END card-->
    </div>
</div><!-- END row-->
@endsection
@section('script')
<script>
    url = "{{ route('user_api',':ID') }}";

    function setData(datas){
        var tags = document.querySelectorAll('.input-block');
        if(!datas['estado']){
            showMessage(datas['mensaje']);
            return;
        }
        
        visibleInput(true);
        document.getElementById('tipo').value = '1';

        tags.forEach((element)=>{
            switch(element.name){
                case 'nombre':
                    element.value = datas['nombre'];
                    break;
                case 'genero':
                    if(datas['genero'] == 'MASCULINO'){
                        element.value = 'm';
                    }else{
                        element.value = 'f';
                    }
                    break;
            }
        });
    }
    function sleep (time) {
      return new Promise((resolve) => setTimeout(resolve, time));
    }
    function getEgresados(){
        var input = document.getElementById('registro');
        console.log("enviando",input.value);
        if(input.value.length == 0){
            showMessage('Debe ingresar el código del egresado para realizar la búsqueda');
            return;
        }

        url_copy = url.replace(':ID',input.value);
        $.get(url_copy,function(rsp){
            clearAll();
            setData(rsp);
        });
    }

    function visibleInput(sw){
        var tag = document.querySelectorAll('.input-block')
        tag.forEach((element)=>{
            element.disabled = sw;
        });
    }

    function changeInterface(){
        var select = document.getElementById('tipo');
        if(select.value.length > 0){
            if(select.value == "1"){
                visibleInput(true);
            }else{
                visibleInput(false);
                //clearAll();
            }
        }else{
            console.log("no cambio el tipo");
        }
    }

    function clearAll(){
        var tags = document.querySelectorAll('.clear-input')
        tags.forEach((element)=>{
            element.value = '';
        });
    }
    function showMessage(msg){
        $( ".error-codigo" ).text(msg);
        $( ".error-codigo" ).show(1000,function(){
            sleep(5000).then(()=>{
                $( ".error-codigo" ).hide(1000);
            });
        });
    }
</script>
@endsection