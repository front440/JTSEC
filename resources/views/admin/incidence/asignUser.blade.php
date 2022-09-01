@extends('admin.base')
@section("titulo-pagina", "Asignar usuario")
@section('contenido2')
<form method="POST" action="add/">
    @csrf
    <div class="form-group row">
        <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

        <div class="col-md-6">

            <select name="user" id="status" class="form-select">
                @foreach($userManager as $user)
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

    <div class="form-group row mb-0 mt-3">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Asignar Usuario') }}
            </button>
        </div>
    </div>
</form>

@endsection