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
<h2>Egresados - Modalidad graduación</h2>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <!-- START card-->
        <div class="card card-default">
            <div class="card-header">Registro de Usuarios</div>
            <div class="card-body">
	            <form method="POST" action="{{route('egresado.store')}}" >
	                @csrf
	                <div class="form-group mb-0">
	                    <label style="display: block; margin-bottom: 0px">Registro: </label>
	                    <span class="nota mt-0" style="display: block;">Nota: ingrese el registro del egresado</span>
	                    <input name="registro" id="registro" type="number" placeholder="Ingrese el código" class="buscador">
	                    <a href="#!" onclick="getEgresados()" class="btn btn-secondary">Buscar</a>
	                </div>
	                <span class="error-codigo"></span>

	                <div class="form-row mt-2">
	                	<div class="form-group col-md-4 col-12 col-sm-6">
		                    <label>Nombre completo: </label>
		                    <input disabled name="nombre" class="form-control input-block clear-input-search" type="text" placeholder="Nombre completo del egresado">
		                </div>
                        
                        <div class="form-group col-md-4 col-12 col-sm-6">
                            <label>Semestre y año de ingreso a la universidad: </label>
                            <input disabled name="sem_anio_ingreso" class="form-control input-block clear-input-search" type="text" placeholder="Semestre y año de ingreso">
                        </div>

		                <div class="form-group col-md-4 col-12 col-sm-6">
		                    <label>Semestre y año de postulación: </label>
		                    <input disabled name="sem_anio_postulacion" class="form-control input-block clear-input-search" type="text" placeholder="Semestre y año de postulación">
		                </div>

		                <div class="form-group col-md-4 col-12 col-sm-6">
		                    <label>`Tipo de modalidad: </label>
		                    <select name="tipo" id="tipo" onchange="changeInterface();" class="form-control">
		                        <option value="">Elija la modalidad</option>
		                        <option value="1">Graduación directa</option>
		                        <option value="2">Examen de grado</option>
		                        <option value="3">Trabajo dirigido/grado/tesis</option>
		                    </select>
		                </div>


								{{-- G. DIRECTA --}}
		                <div class="form-group col-md-4 col-12 col-sm-6">
		                    <label>Forma: </label>
		                    <select name="forma" id="" class="form-control clear-input graduacion_directa">
		                        <option value="">Elija tipo de graduación</option>
		                        <option value="1">Excelencia</option>
		                        <option value="2">Rendimiento</option>
		                        <option value="3">Desempeño</option>
		                    </select>
		                </div>

		                <div class="form-group col-md-4 col-12 col-sm-6">
		                    <label>Nota: </label>
		                    <input name="nota" class="form-control clear-input graduacion_directa" type="decimal" placeholder="Ingrese la nota">
		                </div>

		                		{{-- EXAMEN GRADO --}}
		                <div class="form-group col-md-4 col-12 col-sm-6">
		                    <label>Fecha sorteo de área: </label>
		                    <input name="fsorteoarea" class="form-control clear-input examen_grado" type="date" placeholder="Ingrese la fecha">
		                </div>
		                

		                <div class="form-group col-md-4 col-12 col-sm-6">
		                    <label>Área: </label>
		                    <select name="area_id" id=""  class="form-control clear-input examen_grado trabajo_tesis">
		                        <option value="">Elija el área</option>
		                        @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endforeach
		                    </select>
		                </div>
						

								{{-- TRABAJO DIRIGIDO/TESIS --}}

						<div class="form-group col-md-4 col-12 col-sm-6">
		                    <label>Fecha de presentación: </label>
		                    <input name="fpresentacion" class="form-control clear-input trabajo_tesis" type="date" placeholder="Ingrese la fecha">
		                </div>

		                <div class="form-group col-md-4 col-12 col-sm-6">
		                    <label>Titulo del proyecto: </label>
		                    <input name="titulo" class="form-control clear-input trabajo_tesis" type="text" placeholder="Ingrese el título del proyecto">
		                </div>
						
						<div class="form-group col-md-4 col-12 col-sm-6">
		                    <label>Tutor: </label>
		                    <select name="guia_id" id=""  class="form-control clear-input trabajo_tesis">
		                        <option value="">Elija el tutor</option>
		                        @foreach($tutores as $tutor)
		                            <option value="{{$tutor->id}}">{{$tutor->apellido.' '.$tutor->nombre.' - '.$tutor->registro}}</option>
		                        @endforeach
		                    </select>
		                </div>

		                <input type="text" name="egresado_id" id="egresado_id" placeholder="Identificador del egresado" class="clear-input-search">
		            </div>

		            <div class="d-flex justify-content-end col-sm-12">
		            	<input type="submit" class="btn btn-primary" disabled id="btn_enviar">
		            </div>
		        </form>
            </div>
        </div><!-- END card-->
    </div>
</div><!-- END row-->
@endsection
@section('script')
<script>
    url = "{{ route('graduacion_api',':ID') }}";

    function setData(datas){
        var tags = document.querySelectorAll('.input-block');
        if(!datas['estado']){
            showMessage(datas['mensaje']);

            document.getElementById('btn_enviar').disabled = true;
            clearSearch('.clear-input-search');
            return;
        }
        
        //visibleInput(true);
        document.getElementById('egresado_id').value = datas['id'];

        tags.forEach((element)=>{
            switch(element.name){
                case 'nombre':
                    element.value = datas['nombre'];
                    break;
                case 'sem_anio_postulacion':
                    element.value = datas['sem_postulacion']+"/"+datas['anio_postulacion'];
                    break;
                case 'sem_anio_ingreso':
                    element.value = datas['sem_ingreso']+"/"+datas['anio_ingreso'];
                    break;
            }
        });

        document.getElementById('btn_enviar').disabled = false;

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
            console.log(rsp);
            //clearAll();
            setData(rsp);
        });
    }

    function visibleInput(sw,identificador){
        var tag = document.querySelectorAll(identificador);
        tag.forEach((element)=>{
            element.disabled = sw;
        });
    }

    function changeInterface(){
        var select = document.getElementById('tipo');
        console.log(select.value);
        if(select.value.length > 0){
            switch(select.value){
                case "1":
                    hideAll();
                    visibleInput(false,'.graduacion_directa');
                    console.log("as");
                    break;
                case "2":
                    hideAll();
                    visibleInput(false,'.examen_grado');
                    console.log("as2");
                    break;
                case "3":
                    hideAll();
                    visibleInput(false,'.trabajo_tesis');
                    console.log("as3");
                    break;
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

    function clearSearch(nombre){
        var tags = document.querySelectorAll(nombre);
        tags.forEach((element)=>{
            element.value = '';
        });
    }

    function hideAll(){
        var tag = document.querySelectorAll('.clear-input');
        tag.forEach((element)=>{
            element.disabled = true;
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