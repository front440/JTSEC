@extends('admin.base')
@section('contenido2')
<div>
    <h3>{{$project->name}}</h3>
    <h6>{{$project->description}}</h6>
</div>
<p style="text-align: center"><a href="add-activity"><button type="button" class="btn btn-primary">Crear nueva actividad</button></a></p>
<table class="table p-3">
    <thead>
        <h4>Actividades</h4>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>


            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
        <tr>
            <td scope="row">{{ $activity->name }}</td>
            <td>{{ $activity->description }}</td>

            <td><button class="btn btn-primary btn-sm"><a class="text-white text-decoration-none" href="activity/{{$activity->id}}/incidences">Ver Incidencias</a></button></td> 
            {{-- <td><button class="btn btn-primary btn-sm"><a class="text-white text-decoration-none" href="activity/asign-user">Asignar Usuario</a></button></td>  --}}
            

        </tr>
        @endforeach
    </tbody>
</table>
{{-- <script>
    window.addEventListener('load',function(){
        document.getElementById("texto").addEventListener("keyup", () => {
            if((document.getElementById("texto").value.length)>=1)
                fetch(`/nombres/buscador?texto=${document.getElementById("texto").value}`,{ method:'get' })
                .then(response  =>  response.text() )
                .then(html      =>  {   document.getElementById("resultados").innerHTML = html  })
            else
                document.getElementById("resultados").innerHTML = ""
        })
    });  
</script> --}}
@endsection