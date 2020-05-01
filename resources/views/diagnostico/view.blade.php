@extends('layout.layout')

@section('titulo')
   Detalle de Diagnostico

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de Diagnostico</h1> 
   <br><br>
   
   <div class="row">
    <h4>Tipo : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$diagnostico->tipo}}</p>
</div>
</div>

<br>

<div class="row">
            <h4>complicaciones : </h4>
            <div class="col-sm-3">
            <p class="lead">{{$diagnostico->complicaciones}}</p>
        </div>
</div>


<br><br>

<div class="row">
    <a href=" {{route('diagnostico.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection