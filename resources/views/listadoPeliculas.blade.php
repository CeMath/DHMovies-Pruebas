@extends("plantilla")

@section("titulo")
    Listado de todas las peliculas
@endsection

@section("principal")
<h1> Listado de peliculas </h1>
<br>
<div class = "principal">
@forelse ($arrayPeliculas as $peliculas)
    <div class="pelicula">
    <h6> <a href="{{ url('/detallePelicula/' . $peliculas['id']) }}" class="">{{$peliculas["title"]}} </a> </h6>
    <p> {{$peliculas["rating"]}} </p>
    </div>
    <br>    
@empty
    <p> No hay Peliculas </p>
@endforelse
</div>

    
@endsection