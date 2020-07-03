@extends("plantilla")

@section("titulo")
    Detalle de Pelicula
@endsection

@section("principal")
    <h1> Detalle de la pelicula {{$peliculas["title"]}} </h1>    
    <br>

    <p> Esta pelicula fue estrenada el {{$peliculas["release_date"]}}, 
        pertenece al genero {{$generoPelicula["name"]}},
        con {{$peliculas["awards"]}} premios ganados 
        y un rating de {{$peliculas["rating"]}}.
    </p>

    <h5> En esta pelicula actuan: </h5>

    <ul>
        @foreach ($actores as $actor)
        <li> {{$actor["first_name"]}} {{$actor["last_name"]}} </li>
        @endforeach
    </ul>
@endsection