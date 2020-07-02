@extends("plantilla")

@section("titulo")
    DHMovies
@endsection

@section("principal")
<h1> Ultimas peliculas agregadas </h1>
<div class = "principal"> 
@for ($i = 0; $i < 5; $i++ ) 
    <div class = "peliculas"> 
        <h6> {{$ultimasPeliculas[$i]}} </h6>
    </div>
@endfor
</div>
<br>
<h1> Peliculas randoms </h1>
<div class = "principal"> 
@for ($i = 0; $i < 5; $i++ ) 
    <div class = "peliculas"> 
        <h6> {{$peliculasRandoms[$i]}} </h6>
    </div>
@endfor
</div>
@endsection