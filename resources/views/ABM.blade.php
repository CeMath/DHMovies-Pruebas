@extends("plantilla")

@section("titulo")
    Listado de todas las peliculas
@endsection

@section("principal")
<form action="/agregarPelicula" method="get">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar Pelicula</button>
</form>
<br>
<form action="/actualizarPelicula" method="get">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Modificar Pelicula</button>
</form>
<br>
<form action="/borrarPelicula" method="get">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Borrar Pelicula</button>
</form>

<!-- <a href="/agregarPelicula" class="btn btn-primary">Agregar Pelicula</a>
<br>
<br>
<a href="/actualizarPelicula" class="btn btn-primary">Modificar Pelicula</a>
<br>
<br>
<a href="/borrarPelicula" class="btn btn-primary">Borrar Pelicula</a> -->


@endsection