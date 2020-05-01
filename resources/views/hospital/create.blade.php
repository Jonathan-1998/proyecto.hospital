@extends('layout.layout')

@section('titulo')
    Nuevo Hospital
@endsection

@section('contenido')
<h1 class="text-center">Nuevo Hospital</h1>
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

<form action="{{route('hospital.store')}} " method="post" id="formulario">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre del Hospital:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nombre">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Direccion del Hospital:</label>
            <input type="text" class="form-control" name="direccion" placeholder="direccion" id="direccion">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Telefono del Hospital:</label>
            <input type="text" class="form-control" name="telefono" placeholder="telefono" id="telefono">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cantidad de camas:</label>
            <input type="number" class="form-control" name="cantidad_camas" placeholder="0" id="cantidad_camas">
        </div>
    </div>
    <div class="form-row">
        {{-- <button type="submit" class="btn btn-primary">Crear Hopital</button> --}}
        <a href="#" class="btn btn-primary" id="registro">Crear hospital</a>
    </div>

</form>

<Script>
    $('#registro').click(function(){
         var datos = $('#formulario').serialize();
         var ruta =  'guardar';

         $. ajax({
             data: datos,
             url: ruta,
             type: 'POST',
             dataType:  'json',
             success: function(){
                 alert('Datos almacenados');
                 $('#nombre').val('');
                 $('#direccion').val('');
                 $('#telefono').val('');
                 $('#cantidad_camas').val('');
             }
             

         });
    });
</Script>

<br><br>
<div class="row">
<a href="{{route('hospital.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection