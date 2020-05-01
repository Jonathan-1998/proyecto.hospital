@extends('layout.layout')

@section('titulo','Modificar consulta')

@section('contenido')
<h1 class="text-center">Modificar Consulta</h1>
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

<form action="{{route('consulta.update', $consulta->id)}} " method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre de la Consulta: </label>
            <input type="text" class="form-control" name="nombre" value="{{$consulta->nombre}}">
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Fecha: </label>
            <input type="date" class="form-control" name="fecha" value="{{$consulta->fecha}}">
        </div>
    </div>  

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Medico:</label>
            <select name="idMedico" class="form-control" >
                @foreach ($medicos as $medico)
                <option value="{{$medico->id}}"
                    @if ($sala->idMedico == $medico->id) 
                    selected   
                    @endif>
                    {{$medico->nombre}}</option>
                @endforeach   
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Paciente:</label>
            <select name="idPaciente" class="form-control" >
                @foreach ($pacientes as $paciente)
                <option value="{{$paciente->id}}"
                    @if ($sala->idPaciente == $paciente->id) 
                    selected   
                    @endif>
                    {{$paciente->nombre}}</option>
                @endforeach   
            </select>
        </div>
    </div>

    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar Consulta</button>
    </div>

</form>
@endsection
