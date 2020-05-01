@extends('layout.layout')

@section('titulo')
   Detalle de laboratorio

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de laboratorio</h1> 
   <br><br>
   <div class="row">
    <h4>Nombre : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$laboratorio->nombre}}</p>
</div>
</div>

<br>

<div class="row">
            <h4>Direccion : </h4>
            <div class="col-sm-3">
            <p class="lead">{{$laboratorio->direccion}}</p>
        </div>
</div>

<br>

<div class="row">
    <h4>Telefono : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$laboratorio->telefono}}</p>
</div>
</div>



<br><br>

<div class="row">
    <a href=" {{route('laboratorio.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection