@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Notificación</h4>
                    </div>
                    <div class="card-body">
                        {!! Alert::render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection