

@extends('layout.layout')

@section('titulo')
    Pacientes
@endsection

@section('contenido')
    <h1 class="text-center">Pacientes</h1>
    <br><br>
    
    @if($message = Session::get('exito'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        
            <thead>
                <th>Cedula identidad</th>
                <th>Numero registro</th>
                <th>Numero cama</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </thead>
        
            <tbody>
                @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{$paciente -> cedula_identidad}}</td>
                    <td>{{$paciente -> numero_registro}}</td>
                    <td>{{$paciente -> numero_cama}}</td>
                    <td>{{$paciente -> nombre}}</td>
                    
                    
                    <td>
                         <form action="{{route('paciente.destroy', $paciente->id)}}" method="post">
                        <a href="{{route('paciente.show', $paciente->id)}}" class="btn btn-info">Ver</a>
                        <a href="{{route('paciente.edit', $paciente->id)}}" class="btn btn-primary">Editar</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Eliminar</button>
                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
<br><br>
    <div class="row">
        <a href="{{route('paciente.create')}} "><button class="btn btn-success">Crear paciente</button></a>
    </div>
    
<br>

<div class="row">
    <a href="{{route('inicio')}}"><button class="btn btn-primary">Volver</button></a>
</div>

@endsection