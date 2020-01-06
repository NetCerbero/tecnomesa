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
            <div class="card-header">Edicion regiménm</div>
            <div class="card-body">
            <form method="POST" action="{{route('regimen.update', $regimen->id)}}" >
                @csrf
                @method('PUT')
                <div class="form-group col">
                    <label>Regimen: </label>
                    <input name="tipo" class="form-control input-block clear-input" value="{{$regimen->tipo}}" type="text" placeholder="tipo">
                </div>
                <div class="d-flex justify-content-end col-sm-12">
                    <input type="submit" class="btn btn-primary" value="Guardar cambios">
                </div>
            </form>
@endsection
@section('script')

@endsection
