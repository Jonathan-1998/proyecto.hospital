@extends('layout.layout')

@section('titulo')
    Nuevo Detalle diagnostico
@endsection

@section('contenido')
<h1 class="text-center">Nuevo Detalle diagnostico</h1>
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

<form action="{{route('detallediagnostico.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Fecha del detalle diagnostico:</label>
            <input type="date" class="form-control" name="fecha" placeholder="fecha">
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
        <div class="form-group col-md-6">
            <label>Diagnostico: </label>
            <select name="idDiagnostico"  class="form-control">
                @foreach ($diagnosticos as $diagnostico)
            <option value="{{$diagnostico->id}}" >{{$diagnostico->tipo}}</option>
                @endforeach
            </select>
            
        </div>
    </div>

        
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear detalle diagnostico</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('detallediagnostico.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection