@extends('layout.layout')

@section('titulo')
    Nuevo laboratorio
@endsection

@section('contenido')
<h1 class="text-center">Nuevo laboratorio</h1>
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

<form action="{{route('laboratorio.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre del Laboratorio:</label>
            <input type="text" class="form-control" name="nombre" placeholder="nombre">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Direccion del laboratorio:</label>
            <input type="text" class="form-control" name="direccion" placeholder="direccion">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Telefono del laboratorio:</label>
            <input type="text" class="form-control" name="telefono" placeholder="telefono">
        </div>
    </div>

   
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear laboratorio</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('laboratorio.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection