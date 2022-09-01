@extends('admin.base')
@section('contenido2')
<table class="table p-3">
    <thead>
        <tr>
            <th scope="col">Nombre Proyecto</th>
            <th scope="col">Descripción Proyecto</th>
            <th scope="col">Rol</th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td scope="row">{{ $project[0]->name }}</td>
            <td>{{ $project[0]->description }}</td>
            <td>{{ $project[1] }}</td>            

        </tr>
        @endforeach
    </tbody>
</table>

@endsection