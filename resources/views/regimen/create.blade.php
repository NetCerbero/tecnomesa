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
            <div class="card-header">Registro de regimén</div>
            <div class="card-body">
            <form method="POST" action="{{route('regimen.store')}}" >
                @csrf
                <div class="form-group col">
                    <label>Regimen: </label>
                    <input name="tipo" class="form-control input-block clear-input" type="text" placeholder="Ingrese el nombre del regimén">
                </div>
                <div class="d-flex justify-content-end col-sm-12">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
@endsection
@section('script')

@endsection