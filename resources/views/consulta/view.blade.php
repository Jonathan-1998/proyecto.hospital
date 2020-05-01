@extends('layout.layout')

@section('titulo')
   Detalle de Consulta

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de consulta</h1> 
   <br><br>
   <div class="row">
    <h4>Nombre : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$consulta->nombre}}</p>
</div>
</div>

<br>

<div class="row">
    <h4>Fecha : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$consulta->fecha}}</p>
</div>
</div>

<br>

<div class="row">
    <h4>Medico: </h4>
    <div class="col-sm-3">
    <p class="lead">{{$consulta->medico}}</p>
</div>
</div>

<br>

<div class="row">
        <h4>Paciente: </h4>
        <div class="col-sm-3">
        <p class="lead">{{$consulta->paciente}}</p>
</div>
</div>

<br><br>

<div class="row">
    <a href=" {{route('consulta.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection