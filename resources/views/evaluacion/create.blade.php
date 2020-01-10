@extends('template')
@section('style')

@endsection
@section('title')
<h3>Asignacion de nota</h3>
@endsection
@section('content')
<div class="row m-2">
        <!-- START card-->
        <div class="card card-default col">
            <div class="card-header">
                Registro de nota - 
                @if ($evaluacion->tipo == 2)
                    <strong>Examen de grado</strong>
                @else
                    <strong>Trabajo dirigido/Tesis</strong>
                @endif
            </div>
            <div class="card-body">
            <form method="POST" action="{{route('evaluacion.store')}}" class="form-row">
                @csrf
                <div class="form-group col col-md-6">
                    <label>Examen escrito 1: </label>
                    <input name="eva1" class="form-control input-block clear-input" type="decimal" placeholder="Ingrese la nota">
                </div>

                <div class="form-group col col-md-6">
                    <label>Examen escrito 2: </label>
                    @if ($evaluacion->tipo == 2)
                        <input name="eva2" disabled class="form-control input-block clear-input" type="decimal" placeholder="Ingrese la nota">
                    @else
                        <input name="eva2" class="form-control input-block clear-input" type="decimal" placeholder="Ingrese la nota">
                    @endif
                    
                </div>

                <div class="form-group col col-md-6">
                    <label>Examen oral - presentación: </label>
                    <input name="oral" class="form-control input-block clear-input" type="decimal" placeholder="Ingrese la nota">
                </div>

                <div class="form-group col col-md-6">
                    <label>Obsevación</label>
                    @if ($evaluacion->tipo == 2)
                        <input name="observacion" disabled class="form-control input-block clear-input" type="text" placeholder="Ingrese la observacion">
                    @else
                        <input name="observacion" class="form-control input-block clear-input" type="text" placeholder="Ingrese la observacion">
                    @endif
                </div>
                <input type="hidden" name="tipo" value="{{ $evaluacion->tipo }}">
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="d-flex justify-content-end col-sm-12">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
</div>
@endsection
@section('script')

@endsection