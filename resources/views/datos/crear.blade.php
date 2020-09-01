@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center my-5">
        <div class="card col-md-10">
            <div class="card-header d-flex justify-content-between">
                Ingresar nuevo dato de {{auth()->user()->name}}
                <a href="{{route('lista')}}" class="btn btn-primary btn-sm">Regresar a Lista</a>                
            </div>
            <div class="card-body">
                <form action="{{route('datos.anexar')}}" method="POST">
                    @csrf
                    @error('nombre')
                        <div class="alert alert-danger">
                            Nombre es Requerido
                        </div>
                    @enderror

                    @error('descripcion')
                        <div class="alert alert-danger">
                            Descripción es Requerida
                        </div>
                    @enderror

                    @if (session('creado'))
                        <div class="alert alert-success">
                            {{ session('creado') }}
                        </div>
                    @endif

                    <input type="text" name="nombre" placeholder="Nombre" class="form-control my-3" value="{{ old('nombre') }}">
                    <input type="text" name="descripcion" placeholder="Descripcion" class="form-control my-3" value="{{ old('descripcion') }}">
                    <button type="submit" class="btn-block btn-primary">Enviar</button>

                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection