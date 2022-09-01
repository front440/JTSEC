@extends('admin.base')
@section('contenido2')
<table class="table p-3">
    <thead>
        <tr>
            <th scope="col">Nombre Incidencia</th>
            <th scope="col">Descripción Incidencia</th>

            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($activityHasUsers as $activity)
        <tr>
            <td scope="row">{{ $activity->name }}</td>
            <td>{{ $activity->description }}</td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection