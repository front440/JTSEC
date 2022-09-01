@extends('admin.base')
@section('contenido2')
<p style="text-align: center"><a href="add-incidence"><button type="button" class="btn btn-primary">Crear nueva incidencia</button></a></p>
<table class="table p-3">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>


            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($incidences as $incidence)
        <tr>
            <td scope="row">{{ $incidence->name }}</td>
            <td>{{ $incidence->description }}</td>

            

        </tr>
        @endforeach
    </tbody>
</table>

@endsection