@extends('layout.layout')

@section('titulo')
   Detalle de Paciente

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de paciente</h1> 
   <br><br>

   <div class="row">
    <h4>Cedula de identidad : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$paciente->cedula_identidad}}</p>
</div>
</div>

<div class="row">
    <h4>Numero de registro : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$paciente->numero_registro}}</p>
</div>
</div>

<div class="row">
    <h4>Numero de camas : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$paciente->numero_cama}}</p>
</div>
</div>

   <div class="row">
    <h4>Nombre : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$paciente->nombre}}</p>
</div>
</div>


<div class="row">
            <h4>Direccion : </h4>
            <div class="col-sm-3">
            <p class="lead">{{$paciente->direccion}}</p>
        </div>
</div>


<div class="row">
    <h4>Fecha de nacimiento : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$paciente->fecha_nacimiento}}</p>
</div>
</div>

<div class="row">
    <h4>Sexo : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$paciente->sexo}}</p>
</div>
</div>

<br><br>

<div class="row">
    <a href=" {{route('paciente.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection