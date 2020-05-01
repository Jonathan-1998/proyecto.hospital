@extends('layout.layout')

@section('titulo','Modificar Diagnostico')

@section('contenido')
<h1 class="text-center">Modificar Diagnostico</h1>
<br><br>

@if ($errors->any())
    <div class="alert alert-danger">
        <div class="header"> <strong>Ups. =)</strong>Algo anda mal...</div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                
            @endforeach
        </ul>
    </div>
@endif

<br><br>

<form action="{{route('diagnostico.update', $diagnostico->id)}} " method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Tipo de diagnostico: </label>
            <input type="text" class="form-control" name="tipo" value="{{$diagnostico->tipo}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Complicaciones: </label>
            <input type="text" class="form-control" name="complicaciones" value="{{$diagnostico->complicaciones}}">
        </div>
    </div>
    <br>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar Diagnostico</button>
    </div>

</form>
@endsection
