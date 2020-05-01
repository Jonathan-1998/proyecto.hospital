@extends('layout.layout')

@section('titulo')
    Nueva Consulta
@endsection

@section('contenido')
<h1 class="text-center">Nueva Consulta</h1>
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

<form action="{{route('consulta.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre de la Consulta:</label>
            <input type="text" class="form-control" name="nombre" placeholder="nombre">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Fecha :</label>
            <input type="date" class="form-control" name="fecha" placeholder="año/mes/dia">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Medico: </label>
            <select name="idMedico"  class="form-control">
                @foreach ($medicos as $medico)
            <option value="{{$medico->id}}" >{{$medico->nombre}}</option>
                    
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
        <button type="submit" class="btn btn-primary">Crear Consulta</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('consulta.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection