@extends("plantilla")

@section("titulo")
    Detalle de Pelicula
@endsection

@section("principal")
    <h1> Detalle de la pelicula {{$peliculas["title"]}} </h1>    
    <br>
    
    <p> 
        {{$peliculas["title"]}} fue estrenada el {{date('d-M-Y', strtotime($peliculas["release_date"]))}},

        @if ($peliculas->genero) 
        pertenece al genero {{$peliculas->genero->name}},
        @endif

        con {{$peliculas["awards"]}} premios ganados 
        y un rating de {{$peliculas["rating"]}} puntos.
    </p>

    <h5> En esta pelicula actuan: </h5>

    <ul>
        @forelse ($peliculas->actores as $actor)
        <li> {{$actor["first_name"]}} {{$actor["last_name"]}} </li>
        @empty 
        <p> No hay registro de los actores. </p>
        @endforelse
    </ul>
@endsection