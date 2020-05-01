@extends('layout.layout')

@section('titulo')
   Detalle de Hospital

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de hospital</h1> 
   <br><br>
   <div class="row">
    <h4>Nombre : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$hospital->nombre}}</p>
</div>
</div>

<br>

<div class="row">
            <h4>Direccion : </h4>
            <div class="col-sm-3">
            <p class="lead">{{$hospital->direccion}}</p>
        </div>
</div>

<br>

<div class="row">
    <h4>Telefono : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$hospital->telefono}}</p>
</div>
</div>

<br>

<div class="row">
    <h4>Cantidad de camas : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$hospital->cantidad_camas}}</p>
</div>
</div>

<br><br>

<div class="row">
    <a href=" {{route('hospital.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection