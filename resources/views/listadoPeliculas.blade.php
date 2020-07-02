@extends("plantilla")

@section("titulo")
    Listado de todas las peliculas
@endsection

@section("principal")
<h1> Listado de peliculas </h1>
<br>
<div class = "principal">
@forelse ($arrayPeliculas as $pelicula)
    <div class="pelicula">
    <h6> {{$pelicula["title"]}} </h6>
    <p> {{$pelicula["rating"]}} </p>
    </div>
    <br>
@empty
    <p> No hay Peliculas </p>
@endforelse
</div>

    
@endsection