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
@endsection
@section('title')
<h3>Edicion de tribunales</h3>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <!-- START card-->
        <div class="card card-default">
            <div class="card-header">Tribunales</div>
            <div class="card-body">
            <form method="POST" action="{{route('asignacion.update',$evaluacion->id)}}" class="form-row" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group col-12">
                    <label>Tipo evaluación: </label>
                    <select name="tipo" id="tipo" class="form-control" onchange="changeInterface()">
                        <option value="">Elija el sector</option>
                        @if ($evaluacion->tipo == 2)
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
                    <input  name="finicio" type="date" class="form-control tesis  examen" value="{{ $evaluacion->finicio }}">
                </div>
                
                <div class="form-group col-6">
                    <label>Fecha final: </label>
                    @if ($evaluacion->tipo == 2)
                        <input  disabled name="ffinal" type="date" class="form-control tesis" value="{{ $evaluacion->ffinal }}">
                    @else
                        <input  name="ffinal" type="date" class="form-control tesis" value="{{ $evaluacion->ffinal }}">
                    @endif
                    
                </div>

                <div class="form-group col-6">
                    <label>Fecha defensa (oral): </label>
                    <input  name="fdefensa" type="date" class="form-control tesis examen" value="{{ $evaluacion->fdefensa }}">
                </div>

                <div class="form-group col-6">
                    <label>Número de resolución: </label>
                    @if ($evaluacion->tipo == 2)
                        <input disabled name="nresolucion" class="form-control tesis" value="{{ $evaluacion->nresolucion }}">
                    @else
                        <input  name="nresolucion" class="form-control tesis" value="{{ $evaluacion->nresolucion }}">
                    @endif
                </div>
                
                <div class="form-group col-12">
                    <label>Tribunales: </label>
                    <select name="tribunal_id[]" id="" class="chosen-select form-control" multiple>
                        <option value="">Elija los tribunales</option>
                        @foreach ($tribunales as $tribunal)
                            @php
                                $sw = false;
                            @endphp
                            @if ($evaluacion->tribunal)
                                @foreach ($evaluacion->tribunal as $tri)
                                    @if ($tri->id == $tribunal->id )
                                        @php
                                            $sw = true;
                                        @endphp
                                        <option selected value="{{ $tribunal->id }}">{{ $tribunal->nombre.' '.$tribunal->apellido.' - '.$tribunal->registro }}</option>
                                    @endif
                                @endforeach
                            @endif
                                
                            @if (!$sw)
                               <option value="{{ $tribunal->id }}">{{ $tribunal->nombre.' '.$tribunal->apellido.' - '.$tribunal->registro }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>            

                <div class="d-flex justify-content-end col-sm-12">
                    <input type="submit" class="btn btn-primary" id="btn_enviar" disabled>
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