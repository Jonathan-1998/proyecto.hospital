@extends('layout.layout')

@section('titulo')
    Nuevo Hospital
@endsection

@section('contenido')
<h1 class="text-center">Nuevo Hospital</h1>
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

<form action="{{route('hospital.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre del Hospital:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Direccion del Hospital:</label>
            <input type="text" class="form-control" name="direccion" placeholder="direccion">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Telefono del Hospital:</label>
            <input type="text" class="form-control" name="telefono" placeholder="telefono">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cantidad de camas:</label>
            <input type="number" class="form-control" name="cantidad_camas" placeholder="0">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Hopital</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('hospital.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection