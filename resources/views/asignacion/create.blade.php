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
<h3>Registro de tribunal</h3>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <!-- START card-->
        <div class="card card-default">
            <div class="card-header">Registro tribunal</div>
            <div class="card-body">
            <form method="POST" action="{{route('asignacion.store')}}" class="form-row" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-12">
                    <label>Tipo evaluación: </label>
                    <select name="tipo_selected" disabled id="tipo" class="form-control" onchange="changeInterface()">
                        <option value="">Elija el sector</option>
                        @if ($graduacion->tipo == 2)
                            <option selected value="2">Examen de grado</option>
                            <option value="3">Trabajo dirigido/tesis</option>
                        @else
                            <option value="2">Examen de grado</option>
                            <option selected value="3">Trabajo dirigido/tesis</option>
                        @endif
                        
                    </select>
                </div>
                <div class="form-group col-6">
                    <label>Fecha inicio: </label>
                    <input  name="finicio" type="date" class="form-control tesis  examen" required>
                </div>
                
                <div class="form-group col-6">
                    <label>Fecha final: </label>
                    @if ($graduacion->tipo == 2)
                        <input disabled name="ffinal" type="date" class="form-control tesis">
                    @else
                        <input  name="ffinal" type="date" class="form-control tesis">
                    @endif
                    
                </div>

                <div class="form-group col-6">
                    <label>Fecha defensa (oral): </label>
                    <input  name="fdefensa" type="date" class="form-control tesis examen" required>
                </div>

                <div class="form-group col-6">
                    <label>Número de resolución: </label>
                    @if ($graduacion->tipo == 2)
                        <input  name="nresolucion" disabled type="text" class="form-control tesis" value="Ingrese el codigo de resolucion">
                    @else
                        <input  name="nresolucion" type="text" class="form-control tesis" value="Ingrese el codigo de resolucion">
                    @endif
                    
                </div>
                
                <div class="form-group col-12">
                    <label class="mb-0">Tribunal: </label>
                    @if ($graduacion->tipo == 2)
                        <span class="mensaje">Nota: debe seleccionar 2 tribunales</span>
                    @else
                        <span class="mensaje">Nota: debe seleccionar 3 tribunales</span>
                    @endif
                    <select name="tribunal_id[]" id="" class="chosen-select form-control" multiple required>
                        <option value="">Elija el tribunal</option>
                        @foreach ($tribunales as $tribunal)
                            <option value="{{ $tribunal->id }}">{{ $tribunal->nombre.' '.$tribunal->apellido.' - '.$tribunal->registro }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <input name="guia_id" type="hidden" value="{{ $graduacion->tutor->id }}"> --}}
                <input name="graduacion_id" type="hidden" value="{{ $id }}">
                <input type="hidden" name="tipo" value="{{ $graduacion->tipo }}">
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