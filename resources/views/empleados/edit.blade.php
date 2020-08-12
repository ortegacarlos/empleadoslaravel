@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card padding">
            <header>
                <h4>Editar empleado</h4>
                <p>{{ $empleado->nombre }}</p>
            </header>
            <div class="card-body">
                @include('empleados.form')
            </div>
        </div>
    </div>
@endsection