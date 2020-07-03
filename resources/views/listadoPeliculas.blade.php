@extends("plantilla")

@section("titulo")
    Listado de todas las peliculas
@endsection

@section("principal")

<form action="/buscador" method="get">
    <div class="panel-body">
        <label class="label-control">Ingrese el titulo de una pelicula para ver los detalles</label>
        <input type="text" name="tituloPelicula" class="form-control" placeholder="Ingresar el titulo..." required="required">
        <br>
    </div>

    <div class="panel-footer">
        <button type="submit" class="btn btn-success">buscar</button>
    </div>
</form>

<br>

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

{{$arrayPeliculas->links()}}
</div>

    
@endsection