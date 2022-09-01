@extends('admin.base')
@section("titulo-pagina", "Nuevo Proyecto")
@section('contenido2')
<form method="POST" action="create-project/{{ $id }}">
    @csrf
    <div class="form-group row">
        <label for="finish_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de entrega de proyecto') }}</label>

        <div class="col-md-6">
            <input type="date" name="finish_date" class="form-control @error('finish_date') is-invalid @enderror" value="<?php echo date("Y-m-d"); ?>" required autocomplete="finish_date" autofocus>

            @error('finish_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de proyecto') }}</label>

        <div class="col-md-6">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

        <div class="col-md-6">
            <textarea name="description" class="form-control @error('description') is-invalid @enderror"  required autocomplete="description" autofocus></textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Crear proyecto') }}
            </button>
        </div>
    </div>
</form>

@endsection