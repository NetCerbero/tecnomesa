@extends('template')
@section('style')

@endsection
@section('title')
<h3>Registro de avance de proyecto</h3>
@endsection
@section('content')
@foreach ($graduacion->avanceProyecto as $avance)
    <div class="row">
    <div class="col">
        <!-- START card-->
        <div class="card card-default">
            <div class="card-header">Avance de proyecto - <strong>{{ date('d/m/Y', strtotime($avance->created_at)) }}</strong></div>
            <div class="card-body">
            <form method="POST" action="{{route('avance.update',$avance->id)}}" class="form-row" >
                @csrf
                <div class="form-group col-12">
                    <label>Descripción: </label>
                    <TEXTAREA disabled name="descripcion" class="form-control">{{ $avance->descipcion }}</TEXTAREA>
                </div>

                <div class="form-group col-12">
                    <label>Archivo: </label>
                    <a href="{{ Storage::url($avance->file) }}">archivo</a>
                </div>

                <div class="form-group col-12">
                    <label>Comentario: </label>
                    <TEXTAREA  name="comentario" class="form-control"></TEXTAREA>
                </div>
                
                <div class="form-group col-12">
                    <label>Estado: </label>
                    <select name="estado_id" id="" class="form-control">
                        <option value="">Elija el sector</option>
                        <option value="1">Regular</option>
                        <option value="2">Bueno</option>
                        <option value="3">Muy bueno</option>
                        <option value="4">Excelente</option>
                    </select>
                </div>

                {{-- <input name="guia_id" type="hidden" value="{{ $graduacion->tutor->id }}">
                <input name="trabajo_id" type="hidden" value="{{ $id }}">
 --}}
                <div class="d-flex justify-content-end col-sm-12">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endforeach
@endsection
@section('script')

@endsection