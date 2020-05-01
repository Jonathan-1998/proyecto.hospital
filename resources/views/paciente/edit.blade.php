@extends('layout.layout')

@section('titulo','Modificar paciente')

@section('contenido')
<h1 class="text-center">Modificar Paciente</h1>
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

<form action="{{route('paciente.update', $paciente->id)}} " method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cedula identidad:</label>
            <input type="number" class="form-control" name="cedula_identidad" value="{{$paciente->cedula_identidad}}">
        </div>
    </div> 
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Numero de registro:</label>
            <input type="number" class="form-control" name="numero_registro" value="{{$paciente->numero_registro}}">
        </div>
    </div> 

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Numero de cama:</label>
            <input type="number" class="form-control" name="numero_cama" value="{{$paciente->numero_cama}}">
        </div>
    </div> 

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre del Paciente:</label>
            <input type="text" class="form-control" name="nombre" value="{{$paciente->nombre}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Direccion del paciente:</label>
            <input type="text" class="form-control" name="direccion" value="{{$paciente->direccion}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Fecha de nacimiento:</label>
            <input type="text" class="form-control" name="fecha_nacimiento" value="{{$paciente->fecha_nacimiento}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Sexo: </label>
            <input type="text" class="form-control" name="sexo" value="{{$paciente->sexo}}">
        </div>
    </div>

     
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar Paciente</button>
    </div>

</form>
@endsection
