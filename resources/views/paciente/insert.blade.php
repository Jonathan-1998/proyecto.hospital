@extends('layout.layout')

@section('titulo')
    Nuevo Paciente
@endsection

@section('contenido')
<h1 class="text-center">Nuevo Paciente</h1>
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

<form action="{{route('paciente.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cedula de identidad:</label>
            <input type="number" class="form-control" name="cedula_identidad" placeholder="1234">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Numero de registro: </label>
            <input type="number" class="form-control" name="numero_registro" placeholder="0">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Numero de cama:</label>
            <input type="number" class="form-control" name="numero_cama" placeholder="0">
        </div>
    </div>

    <div class="form-row">
                <div class="form-group col-md-6">
            <label>Nombre del paciente:</label>
            <input type="text" class="form-control" name="nombre" placeholder="nombre">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Direccion del paciente:</label>
            <input type="text" class="form-control" name="direccion" placeholder="direccion">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Fecha de nacimiento:</label>
            <input type="date" class="form-control" name="fecha_nacimiento" >
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Sexo:</label>
            <input type="text" class="form-control" name="sexo" placeholder="sexo">
        </div>
    </div>

    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Paciente</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('paciente.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection