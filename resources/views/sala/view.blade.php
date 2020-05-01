@extends('layout.layout')

@section('titulo')
   Detalle de Sala

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de Sala</h1> 
   <br><br>
   <div class="row">
    <h4>Nombre : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$sala->nombre}}</p>
</div>
</div>

<br>

<div class="row">
    <h4>Cantidad de camas : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$sala->cantidad_camas}}</p>
</div>
</div>

<br>

<div class="row">
    <h4>Hospital: </h4>
    <div class="col-sm-3">
    <p class="lead">{{$sala->hospital}}</p>
</div>
</div>

<br>

<div class="row">
        <h4>Paciente: </h4>
        <div class="col-sm-3">
        <p class="lead">{{$sala->paciente}}</p>
</div>
</div>

<br><br>

<div class="row">
    <a href=" {{route('sala.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection