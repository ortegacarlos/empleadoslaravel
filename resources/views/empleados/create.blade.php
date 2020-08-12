@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card padding">
            <header>
                <h4>Crear empleado</h4>
            </header>
            <div class="card-body">
                @include('empleados.form')
            </div>
        </div>
    </div>
@endsection