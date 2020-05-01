@extends('layout.layout')

@section('titulo')
    Nuevo Medico
@endsection

@section('contenido')
<h1 class="text-center">Nuevo Medico</h1>
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

<form action="{{route('medico.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cedula indentidad: </label>
            <input type="number" class="form-control" name="cedula_identidad" placeholder="0123">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre del medico: </label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Especialidad del medico: </label>
            <input type="text" class="form-control" name="especialdad" placeholder="especialdad">
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
        <button type="submit" class="btn btn-primary">Crear Medico</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('medico.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection