@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center">Datos de <b class="text-primary">{{ auth()->user()->name}}</b></h1>
            <div class="row justify-content-center my-5">
                <div class="card col-md-10">
                    <div class="card-header d-flex justify-content-between bg-dark text-light">
                      Lista de datos de {{ auth()->user()->name}}
                    <a href="{{ route('datos.crear')}}" class="btn btn-primary btn-sm">Añadir Dato</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th>Acciones</th>                                
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $item)
                                    <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->descripcion}}</td>
                                    <td scope="col">
                                        <a href="{{ route('datos.editar', $item) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <form action="{{ route('datos.Eliminar', $item) }}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn-danger btn btn-sm" type="submit">Eliminar</button>
                                        </form>
                                    </td>                                    
                                    </tr>                                                 
                                @endforeach
                            </tbody>
                          </table>
                        {{$datos->links()}}
                    </div>
                  </div>
            </div>
    </div>
@endsection