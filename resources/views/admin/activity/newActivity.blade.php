@extends('admin.base')
@section("titulo-pagina", "Nueva Actividad")
@section('contenido2')
<form method="POST" action="/admin/project/{{ $id }}/add-activity/create">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la actividad') }}</label>

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
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción de la actividad') }}</label>

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
        <label for="users_id" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

        <div class="col-md-6">
            <select name="users_id" id="status" class="form-select">
                @foreach($users[0] as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            @error('user')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Crear Actividad') }}
            </button>
        </div>
    </div>
</form>

@endsection