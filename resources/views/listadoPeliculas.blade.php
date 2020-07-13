@extends("plantilla")

@section("titulo")
    Listado de todas las peliculas
@endsection

@section("buscador")
<form class="my-2" action="/buscador" method="get">
  <div class="col-12 col-md-12">
    <input name="tituloPelicula" required="required" class="form-control mr-sm-2" type="text" placeholder="Ingresar titulo..." aria-label="Search">
  </div>

  <div class="col-12 col-md-12">
    <button class="btn btn-outline-success my-2" type="submit">buscar</button>
  </div>
</form>


@endsection

@section("principal")




<!-- <form action="/buscador" method="get">
    <div class="panel-body">
        <label class="label-control">Ingrese el titulo de una pelicula para ver los detalles</label>
        <input type="text" name="tituloPelicula" class="form-control" placeholder="Ingresar el titulo..." required="required">
        <br>
    </div>

    <div class="panel-footer">
        <button type="submit" class="btn btn-success">buscar</button>
    </div>
</form> -->

<br>


<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">Listado de peliculas</h4>
    @forelse ($arrayPeliculas as $peliculas) 
    <div class="media text-muted pt-3">
      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">{{$peliculas["title"]}}</strong>
          <a href="{{ url('/detallePelicula/' . $peliculas['id']) }}" class="">Detalles </a>
        </div>
        <span class="text-muted">Rating: {{$peliculas["rating"]}}</span>
      </div>
    </div>
    @empty
    <h6> No hay peliculas <h6>
    @endforelse
  </div>
  {{$arrayPeliculas->links()}}
@endsection