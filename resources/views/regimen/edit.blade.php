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
            <div class="card-header">Registro de Usuarios</div>
            <div class="card-body">
            <form method="POST" action="{{route('usuario.store')}}" >
                @csrf
                <div class="form-row mt-2">
                    <div class="form-group col-md-4 col-12 col-sm-6">
                    <label>Nombre: </label>
                    <input name="nombre" class="form-control input-block clear-input" type="text" placeholder="Ingrese el nombre">
                </div>

                <div class="form-group col-md-4 col-12 col-sm-6">
                    <label>Apellido: </label>
                    <input name="apellido" class="form-control input-block clear-input" type="text" placeholder="Ingrese el apellido">
                </div>
            </form>
@endsection
@section('script')

@endsection