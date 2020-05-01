@extends('layout.layout')

@section('titulo')
   Detalle de Medico

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de Medico</h1> 
   <br><br>
 <div class="row">
            <h4>Cedula identidad: </h4>
        <div class="col-sm-3">
            <p class="lead">{{$medico->cedula_identidad}}</p>
        </div>
</div>

<br>

<div class="row">
            <h4>Nombre: </h4>
        <div class="col-sm-3">
            <p class="lead">{{$medico->nombre}}</p>
        </div>
</div>


<br>

<div class="row">
        <h4>Especialidad: </h4>
        <div class="col-sm-3">
        <p class="lead">{{$medico->especialdad}}</p>
</div>
</div>

<br>

<div class="row">
        <h4>Hospital: </h4>
        <div class="col-sm-3">
        <p class="lead">{{$medico->hospital}}</p>
</div>
</div>


<br><br>

<div class="row">
    <a href=" {{route('medico.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection