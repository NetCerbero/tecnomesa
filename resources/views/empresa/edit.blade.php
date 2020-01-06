@extends('template')
@section('style')

@endsection
@section('title')

@endsection
@section('content')
<div class="row">
    <div class="col">
        <!-- START card-->
        <div class="card card-default">
            <div class="card-header">Editar empresa</div>
            <div class="card-body">
            <form method="POST" action="{{route('empresa.update',$empresa->id)}}" class="form-row" >
                @csrf
                @method('PUT')
                <div class="form-group col-md-6">
                    <label>Empresa: </label>
                    <input name="nombre" class="form-control input-block clear-input" type="text" placeholder="Nombre de la empresa">
                </div>

                <div class="form-group col-md-6">
                    <label>Telefono: </label>
                    <input name="telefono" class="form-control input-block clear-input" type="text" placeholder="Telefono">
                </div>

                <div class="form-group col-12">
                    <label>Dirección: </label>
                    <input name="direccion" class="form-control input-block clear-input" type="text" placeholder="Dirección">
                </div>

                <div class="form-group col-md-6">
                    <label>Regimén: </label>
                    <select name="regimen_id" class="form-control">
                        <option value="">Elija el regimén</option>
                        @foreach ($regimenes as $regimen)
                            <option value="{{ $regimen->id }}"> {{ $regimen->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group col-md-6">
                    <label>Sector: </label>
                    <select name="sector_id" id="" class="form-control">
                        <option value="">Elija el sector</option>
                        @foreach ($sectores as $sector)
                             <option value="{{ $sector->id }}"> {{ $sector->sector }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end col-sm-12">
                    <input type="submit" class="btn btn-primary" value='guardar cambios'>
                </div>
            </form>
@endsection
@section('script')

@endsection
