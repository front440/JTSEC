@extends('admin.base')
@section("titulo-pagina", "Asignar usuario")
@section('contenido2')
<form method="POST" action="/admin/project/{{$project->id}}/asign-user/add">
    @csrf
    <div class="form-group row">
        <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

        <div class="col-md-6">

            @if ($userManager == null)
                <p>No hay usuario responsables o participantes</p>
            @else
                <select name="user" id="status" class="form-select">
                    @foreach($userManager as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

            @endif

            @error('user')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="role_type" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

        <div class="col-md-6">

            <select name="role_type" id="status" class="form-select">
                <option value="0">responsable</option>
                <option value="1">participante</option>
            </select>

            @error('role_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
        

    <div class="form-group row mb-0 mt-3">
        <div class="col-md-6 offset-md-4">
            @if ($userManager == null)
            <button type="submit" class="btn btn-primary" disabled = "disabled">
            @else
                <button type="submit" class="btn btn-primary">
            @endif
                    {{ __('Asignar Usuario') }}

            </button>
        </div>
    </div>
</form>

@endsection