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
                @method('PUT')
                <div class="form-group col-12">
                    <label>Descripción: </label>
                    <TEXTAREA disabled class="form-control">{{ $avance->descipcion }}</TEXTAREA>
                </div>

                <div class="form-group col-12">
                    <label>Archivo: </label>
                    <a href="{{ url(Storage::url($avance->file)) }}">archivo</a>
                </div>

                <div class="form-group col-12">
                    <label>Comentario: </label>
                    @if ($avance->comentario)
                        <TEXTAREA disabled class="form-control">{{ $avance->comentario }}</TEXTAREA>
                    @else
                        <TEXTAREA  name="comentario" class="form-control"></TEXTAREA>    
                    @endif
                    
                </div>
                
                <div class="form-group col-12">
                    <label>Estado: </label>
                    @if ($avance->estado_id)
                        <select disabled class="form-control" value="{{ $avance->estado_id }}">
                            <option value="">Elija el sector</option>
                            @if ($avance->estado_id == 1)
                                <option selected value="1">Regular</option>
                            @elseif($avance->estado_id == 2)
                                <option selected value="2">Bueno</option>
                            @elseif($avance->estado_id == 3)
                                <option selected value="3">Muy bueno</option>
                            @elseif($avance->estado_id == 4)
                                <option selected value="4">Excelente</option>
                            @endif
                        </select>
                    @else
                        <select name="estado_id" id="" class="form-control">
                            <option value="">Elija el sector</option>
                            <option value="1">Regular</option>
                            <option value="2">Bueno</option>
                            <option value="3">Muy bueno</option>
                            <option value="4">Excelente</option>
                        </select>
                    @endif
                </div>

                {{-- <input name="guia_id" type="hidden" value="{{ $graduacion->tutor->id }}">
                <input name="trabajo_id" type="hidden" value="{{ $id }}">
 --}}
                @if (!$avance->estado_id || !$avance->comentario)
                    <div class="d-flex justify-content-end col-sm-12">
                        <input type="submit" class="btn btn-primary">
                    </div>
                @endif
            </form>
        </div>
    </div>

@endforeach
@endsection
@section('script')

@endsection