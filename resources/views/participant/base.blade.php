@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-1">
            <p><a href="/home">Inicio</a></p>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Proyecto JTSEC') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                @yield('contenido2')
            </div>
        </div>
    </div>
</div>
@endsection