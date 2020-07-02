@extends("plantilla")

@section("titulo")
    DHMovies
@endsection

@section("principal")
<h1> Ultimas peliculas agregadas </h1>

<div class = "princ"> 
@forelse ($ultimasPeliculas as $peliculas) 
    <div class = "peliculas"> 
    <h6> <a href="{{ url('/detallePelicula/' . $peliculas['id']) }}" class="">{{$peliculas["title"]}} </a> </h6>
    </div>
@empty
    <h6> No hay peliculas <h6>
@endforelse
</div>

<br>

<h1> Peliculas randoms </h1>

<div class = "princ"> 
    @forelse ($randomsPeliculas as $peliculas) 
    <div class = "peliculas"> 
    <h6> <a href="{{ url('/detallePelicula/' . $peliculas['id']) }}" class="">{{$peliculas["title"]}} </a> </h6>
    </div>
    @empty
        <h6> No hay peliculas </6>
    @endforelse
</div>
@endsection