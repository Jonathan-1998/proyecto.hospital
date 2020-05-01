@extends('layout.layout')

@section('titulo','Modificar Detallediagnostico')

@section('contenido')
<h1 class="text-center">Modificar Detalle diagnostico</h1>
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

<form action="{{route('detallediagnostico.update', $detallediagnostico->id)}} " method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Fecha detalle diagnostico: </label>
            <input type="date" class="form-control" name="fecha" value="{{$detallediagnostico->fecha}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Paciente:</label>
            <select name="idPaciente" class="form-control" >
                @foreach ($pacientes as $paciente)
                <option value="{{$paciente->id}}"
                    @if ($detallediagnostico->idPaciente == $paciente->id) 
                    selected   
                    @endif>
                    {{$paciente->nombre}}</option>
                @endforeach   
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Diagnostico:</label>
            <select name="idDiagnostico" class="form-control" >
                @foreach ($diagnosticos as $diagnostico)
                <option value="{{$diagnostico->id}}"
                    @if ($detallediagnostico->idDiagnostico == $diagnostico->id) 
                    selected   
                    @endif>
                    {{$diagnostico->tipo}}</option>
                @endforeach   
            </select>
        </div>
    </div>

    
    
    <br>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar detalle diagnostico</button>
    </div>

</form>
@endsection
