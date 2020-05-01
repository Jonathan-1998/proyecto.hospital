@extends('layout.layout')

@section('titulo')
   Detalle de Diagnostico

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de Diagnostico</h1> 
   <br><br>
   
   <div class="row">
    <h4>Fecha : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$detallediagnostico->fecha}}</p>
</div>
</div>


<br>

<div class="row">
        <h4>Paciente: </h4>
        <div class="col-sm-3">
        <p class="lead">{{$detallediagnostico->paciente}}</p>
</div>
</div>

<br>

<div class="row">
        <h4>Diagnostico: </h4>
        <div class="col-sm-3">
        <p class="lead">{{$detallediagnostico->diagnostico}}</p>
</div>
</div>

<br><br>

<div class="row">
    <a href=" {{route('detallediagnostico.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection