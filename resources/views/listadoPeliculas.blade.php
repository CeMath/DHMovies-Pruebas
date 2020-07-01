@extends("plantilla")

@section("titulo")
    Listado de todas las peliculas
@endsection

@section("principal")

@forelse ($peliculas as $pelicula)
    <div class="container"> 
    <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
        <h2 class="display-5">{{$pelicula["title"]}}</h2>
        <p class="lead">{{$pelicula["rating"]}}</p>
        </div>
        <!-- <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div> -->
    </div>
    </div>
@empty
    <p> No hay Peliculas </p>
@endforelse

    
@endsection