@extends('admin.base')
@section('contenido2')
<div class="p-3 text-center">

    <p style="display: inline"><a href="/admin/project/{{$id}}/asign-user"><button type="button" class="btn btn-primary">Añadir Usuario</button></a></p>
</div>
<table class="table p-3">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">rol</th>


            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($userOfProject as $user)
        <tr>
            <td scope="row">{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->role }}</td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection