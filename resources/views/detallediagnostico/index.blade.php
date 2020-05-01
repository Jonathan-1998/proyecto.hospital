

@extends('layout.layout')

@section('titulo')
Detalle diagnostico
@endsection

@section('contenido')
    <h1 class="text-center">Detalle diagnostico</h1>
    <br><br>
    
    @if($message = Session::get('exito'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        
            <thead>
                <th>Fecha</th>
                <th>Acciones</th>
            </thead>
        
            <tbody>
                @foreach ($detallediagnosticos as $detallediagnostico)
                <tr>
                    <td>{{$detallediagnostico -> fecha}}</td>
                   
                    
                    <td>
                         <form action="{{route('detallediagnostico.destroy', $detallediagnostico->id)}}" method="post">
                        <a href="{{route('detallediagnostico.show', $detallediagnostico->id)}}" class="btn btn-info">Ver</a>
                        <a href="{{route('detallediagnostico.edit', $detallediagnostico->id)}}" class="btn btn-primary">Editar</a>

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
        <a href="{{route('detallediagnostico.create')}} "><button class="btn btn-success">Crear Detalle diagnostico</button></a>
    </div>
    
<br>

<div class="row">
    <a href="{{route('inicio')}}"><button class="btn btn-primary">Volver</button></a>
</div>

@endsection