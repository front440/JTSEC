@extends('admin.base')
@section('contenido2')
<p style="text-align: center"><a href="add-user"><button type="button" class="btn btn-primary">Nuevo Usuario</button></a></p>
<table class="table p-3">
    <thead>
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Nombre</th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td scope="row">{{ $user->email }}</td>
            <td>{{ $user->name }}</td>

            <td><button class="btn btn-primary btn-sm"><a class="text-white text-decoration-none" href="/admin/users/user-view/{{$user->id}}">Ver Proyectos</a></button></td> 
            <td><button class="btn btn-primary btn-sm"><a class="text-white text-decoration-none" href="/admin/users/user-view-activity/{{$user->id}}">Ver Actividades</a></button></td> 
            

        </tr>
        @endforeach
    </tbody>
</table>

@endsection