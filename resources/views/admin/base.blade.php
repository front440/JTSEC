@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <p><a href="/home">Inicio</a></p>
            <p><a href="/admin/project/projects">Proyectos</a></p>
            <p><a href="/admin/user/users">Usuarios</a></p>
            
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('JTSEC') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div class="m-3">
                    @yield('contenido2')
                </div>
            </div>
        </div>
    </div>
</div>
@yield('prueba')
@endsection

