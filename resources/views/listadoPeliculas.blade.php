@extends("plantilla")

@section("titulo")
    Listado de todas las peliculas
@endsection

@section("principal")

    <h1> Listado de peliculas. </h1>

    <ul>
        @forelse ($peliculas as $pelicula)
        <li> 
            <p> {{$pelicula["title"]}} </p>    
            @if ($pelicula["rating"] > 8)
            <p> EXCELENTE </p>
            @endif
        </li>
        @empty
            <p> No hay peliculas en el listado </p>
        @endforelse
    </ul>
    
@endsection