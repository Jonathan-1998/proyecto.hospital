@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                   <table class="table.table-hover">
                    <thead>
                        <tr>
                                <th>Nombre</th>
                                <th>E-Mail</th>
                                <th>Acciones</th>
                                 
                                   
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td> {{$usuario->name}} </td>
                                <td> {{$usuario->email}} </td>
                                <td>
                                <a href="{{route('users.edit', $usuario->id)}}"><button class="btn btn-warning" type="button">Editar</button></a>
                                </td>
                            </tr>
                            @endforeach   
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
