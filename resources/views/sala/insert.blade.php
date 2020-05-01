@extends('layout.layout')

@section('titulo')
    Nueva Sala
@endsection

@section('contenido')
<h1 class="text-center">Nueva Sala</h1>
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

<form action="{{route('sala.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre de sala:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cantidad de camas: </label>
            <input type="number" class="form-control" name="cantidad_camas" placeholder="0">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Hospital: </label>
            <select name="idHospital"  class="form-control">
                @foreach ($hospitals as $hospital)
            <option value="{{$hospital->id}}" >{{$hospital->nombre}}</option>
                    
                @endforeach
            </select>
            
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Paciente: </label>
            <select name="idPaciente"  class="form-control">
                @foreach ($pacientes as $paciente)
            <option value="{{$paciente->id}}" >{{$paciente->nombre}}</option>
                @endforeach
            </select>
            
        </div>
    </div>
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Sala</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('sala.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection