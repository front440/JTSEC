@extends('admin.base')
@section('contenido2')
<div class="p-3 text-center">

    <p style="display: inline"><a href="add-project"><button type="button" class="btn btn-primary">Crear nuevo proyecto</button></a></p>
</div>
<table class="table p-3">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Fecha de finalización</th>


            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td scope="row">{{ $project->name }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->finish_date }}</td>

            <td><button class="btn btn-primary btn-sm"><a class="text-white text-decoration-none" href="/admin/project/{{$project->id}}/activities">Ver Actividades</a></button></td> 
            <td><button class="btn btn-primary btn-sm"><a class="text-white text-decoration-none" href="/admin/project/{{$project->id}}/users">Ver usuarios</a></button></td> 

        </tr>
        @endforeach
    </tbody>
</table>

@endsection