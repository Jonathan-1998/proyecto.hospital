@extends('layout.layout')

@section('titulo')
    Nuevo Servicio
@endsection

@section('contenido')
<h1 class="text-center">Nuevo Servicio</h1>
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

<form action="{{route('servicio.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Fecha del Servicio:</label>
            <input type="date" class="form-control" name="fecha" placeholder="Año/mes/dia">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Descripcion del Servicio:</label>
            <input type="text" class="form-control" name="descripcion" placeholder="descripcion">
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
            <label>Laboratorio: </label>
            <select name="idLaboratorio"  class="form-control">
                @foreach ($laboratorios as $laboratorio)
            <option value="{{$laboratorio->id}}" >{{$laboratorio->nombre}}</option>
                    
                @endforeach
            </select>
            
        </div>
    </div>

    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Servicio</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('servicio.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection