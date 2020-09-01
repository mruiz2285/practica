@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="card col-md-10">
            <div class="card-header d-flex justify-content-between">
                Editar datos de {{$dato->id}}
                <a href="{{route('lista')}}" class="btn btn-primary btn-sm">Regresar a Lista</a>                
            </div>
            <div class="card-body">
                @if (session('actualizado'))
                    <div class="alert alert-success">
                        {{session('actualizado')}}    
                    </div>                    
                @endif
                <form action="{{ route('datos.update', $dato->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control my-3" value="{{$dato->nombre}}">
                    <input type="text" name="descripcion" placeholder="Descripcion" class="form-control my-3" value="{{$dato->descripcion}}">
                    <button type="submit" class="btn-block btn-warning">Editar</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection