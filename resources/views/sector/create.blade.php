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
            <div class="card-header">Registro de sector</div>
            <div class="card-body">
            <form method="POST" action="{{route('sector.store')}}" >
                @csrf
                <div class="form-group col">
                    <label>Sector: </label>
                    <input name="sector" class="form-control input-block clear-input" type="text" placeholder="Ingrese el nombre del sector">
                </div>
                <div class="d-flex justify-content-end col-sm-12">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
@endsection
@section('script')

@endsection