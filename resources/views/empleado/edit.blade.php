@extends('template')
@section('style')

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}"><!-- SLIDER CTRL-->
   <link rel="stylesheet" href="{{ asset('vendor/bootstrap-slider/dist/css/bootstrap-slider.css') }}"><!-- CHOSEN-->
   <link rel="stylesheet" href="{{ asset('vendor/chosen-js/chosen.css') }}"><!-- DATETIMEPICKER-->
   <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}"><!-- COLORPICKER-->
   <link rel="stylesheet" href="{{ asset('vendor/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css') }}"><!-- SELECT2-->
   <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/%40ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.css') }}"><!-- WYSIWYG-->
   <link rel="stylesheet" href="{{ asset('vendor/bootstrap-wysiwyg/css/style.css') }}"><!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" id="bscss"><!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="{{ asset('css/app.css') }}" id="maincss">
   <style>
       .mensaje{
            font-size: 0.9em;
            color: #f75656;
            display: block;
       }
   </style>
@endsection
@section('title')
<h3>Información Laboral Edición</h3>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <!-- START card-->
        <div class="card card-default">
            <div class="card-header">Registro de empleos</div>
            <div class="card-body">
            <form method="POST" action="{{route('inflaboral.update', $empleado->id)}}" class="form-row">
                @csrf
                 @method('PUT')
                <div class="form-group col-12">
                    <label>Funcion que desempeña: </label>
                    <input  name="funcion" type="text" class="form-control tesis" value="{{ $empleado->funcion }}">
                    
                </div>

                <div class="form-group col-12">
                    <label>Conocimiento requerido: </label>
                    <input  name="conocimiento" type="text" class="form-control tesis" value="{{ $empleado->conocimiento }}">
                    
                </div>

                <div class="form-group col-12">
                    <label>Tecnologia: </label>
                    <input  name="tecnologia" type="text" class="form-control tesis" value="{{ $empleado->tecnologia }}">
                    
                </div>
                
                <div class="form-group col-12 col-md-6">
                    <label class="mb-0">Titulado: </label>
                    <select name="titulado_id" id="" class="chosen-select form-control" required>
                        <option value="">Elija el titulado</option>
                        @foreach ($titulados as $titulado)
                            @php
                                $dato = Auth::user()->userDataUagrm($titulado->egresado->registro);
                            @endphp
                            @if ($empleado->titulado_id == $titulado->id)
                                <option selected value="{{ $titulado->id }}">{{ $dato['datos']['nombre'].' - '.$titulado->egresado->registro }}</option>
                            @else
                                <option value="{{ $titulado->id }}">{{ $dato['datos']['nombre'].' - '.$titulado->egresado->registro }}</option>
                            @endif
                            
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="mb-0">Area: </label>
                    <select name="area_id" id="" class="chosen-select form-control" required>
                        <option value="">Elija el area</option>
                        @foreach ($areas as $area)
                            @if ($empleado->area_id == $area->id)
                               <option selected value="{{ $area->id }}">{{ $area->area }}</option>
                            @else
                                <option value="{{ $area->id }}">{{ $area->area }}</option>
                            @endif
                            
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="mb-0">Empresa: </label>
                    <select name="empresa_id" id="" class="chosen-select form-control" required>
                        <option value="">Elija la empresa</option>
                        @foreach ($empresas as $empresa)
                            @if ($empleado->empresa_id == $empresa->id)
                                <option selected value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @else
                                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="mb-0">Nivel de puesto: </label>
                    <select name="nivel_id" id="" class="chosen-select form-control" required>
                        <option value="">Elija el puesto</option>
                        @foreach ($nivelPuestos as $nivelPuesto)
                            @if ($empleado->nivel_id == $nivelPuesto->id)
                                <option selected value="{{ $nivelPuesto->id }}">{{ $nivelPuesto->nivel}}</option>
                            @else
                                <option value="{{ $nivelPuesto->id }}">{{ $nivelPuesto->nivel}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end col-sm-12">
                    <input type="submit" class="btn btn-primary" id="btn_enviar">
                </div>
            </form>
@endsection
@section('script')
<script src="{{ asset('vendor/bootstrap-filestyle/src/bootstrap-filestyle.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script><!-- CHOSEN-->
<script src="{{ asset('vendor/chosen-js/chosen.jquery.js') }}"></script>
  
   <script src="{{ asset('vendor/bootstrap-slider/dist/bootstrap-slider.js') }}"></script><!-- INPUT MASK-->
   <script src="{{ asset('vendor/inputmask/dist/jquery.inputmask.bundle.js') }}"></script><!-- WYSIWYG-->
   <script src="{{ asset('vendor/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script><!-- MOMENT JS-->
   <script src="{{ asset('vendor/moment/min/moment-with-locales.js') }}"></script><!-- DATETIMEPICKER-->
   <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script><!-- COLORPICKER-->
   <script src="{{ asset('vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js') }}"></script><!-- SELECT2-->
   <script src="{{ asset('vendor/select2/dist/js/select2.full.js') }}"></script><!-- =============== APP SCRIPTS ===============-->
   <script src="{{ asset('js/app.js') }}"></script>

<script>
    function hideAll(){
        var tag = document.querySelectorAll('.tesis');
        tag.forEach((element)=>{
            element.disabled = true;
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
        switch(select.value){
            case "2":
                hideAll();
                visibleInput(false,'.examen');
                document.getElementById('btn_enviar').disabled = false;
                break;
            case "3":
                hideAll();
                visibleInput(false,'.tesis');
                document.getElementById('btn_enviar').disabled = false;
                break;
            default:
                document.getElementById('btn_enviar').disabled = true;
                break;
        }
    }
</script>
@endsection