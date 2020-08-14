@extends('layouts.app')

@section('content')
    <div class="row justify-content-sm-center">
        <div class="col-xs-12 col-sm-10 col-md-7 col-lg-6">
            <div class="card border-secondary bg-light mb-3">
                <img class="card-img-top" src="/images/avatar.jpg" alt="Card image">
                <div class="card-body padding">
                    <h1 class="card-title">{{ $empleado->nombre }}</h1>
                    <h5 class="card-subtitle mb-2">Email: {{ $empleado->email }}</h4>
                    <h5 class="card-subtitle mb-2">Sexo: {{ $empleado->sexo }} </h5>
                    <h5 class="card-subtitle mb-2">Área: {{ $empleado->area }} </h5>
                    <h5 class="card-subtitle mb-2">Boletin: {{ $empleado->boletin }} </h5>
                    <p class="card-text">{{ $empleado->descripcion }}</p>
                    <div class="card-actions row justify-content-center">
                        <div class="mr-3">
                            <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}" class="btn btn-secondary">
                                <span>Editar</span>
                            </a>
                        </div>
                        <div class="ml-3">
                            {!! Form::open(['method' => 'DELETE', 'route' => ['empleados.destroy', $empleado->id], 'onsubmit' => 'return confirm("¿Estás seguro de eliminar el empleado?")']) !!}
                                <input type="submit" value="Eliminar" class="btn btn-danger">
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection