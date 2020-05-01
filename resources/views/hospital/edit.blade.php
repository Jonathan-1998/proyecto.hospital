@extends('layout.layout')

@section('titulo','Modificar hospital')

@section('contenido')
<h1 class="text-center">Modificar Hospital</h1>
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

<form action="{{route('hospital.update', $hospital->id)}} " method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre del Hospital:</label>
            <input type="text" class="form-control" name="nombre" value="{{$hospital->nombre}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Direccion del Hospital:</label>
            <input type="text" class="form-control" name="direccion" value="{{$hospital->direccion}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Telefono del Hospital:</label>
            <input type="text" class="form-control" name="telefono" value="{{$hospital->telefono}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cantidad de camas (Meses):</label>
            <input type="number" class="form-control" name="cantidad_camas" value="{{$hospital->cantidad_camas}}">
        </div>
    </div>  
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar Hopital</button>
    </div>

</form>
@endsection
