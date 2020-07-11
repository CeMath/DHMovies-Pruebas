<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Pelicula;
use App\genres;
use App\actors;
use App\actor_movie;
use Auth;


class PeliculasController extends Controller
{
   
    public function listado() {
        $usuarioLog = Auth::user();
        $arrayPeliculas = pelicula::paginate(5);
        $vac = compact("arrayPeliculas");
        $usuario = compact("usuarioLog");

        return view("listadoPeliculas", $vac, $usuario);
    }

    public function detalle($id) {
        $bdPeliculas = pelicula::all();
        $bdActor_movie = actor_movie::all();
        $bdActors = actors::all();
        $bdGenres = genres::all();
        $actoresId = [];
        $actores = [];

        
     // tabla movies columna genre_id
        foreach ($bdPeliculas as $peliculas) {
            if ($peliculas["id"] == $id) {
                
                // Buscamos los id de los actores que trabajaron en la pelicula
                foreach ($bdActor_movie as $actor_movie) {
                    if ($actor_movie["movie_id"] == $peliculas["id"])
                        $actoresId[] = $actor_movie["actor_id"];
                }

                // Buscamos esos id en la tabla de actores
                foreach ($bdActors as $actor) {
                    for ($i = 0; $i < count($actoresId); $i++){
                        if ($actor["id"] == $actoresId[$i]) {
                            $actores[] = $actor;
                        }
                    }
                }

                foreach ($bdGenres as $genero){
                    if ($peliculas["genre_id"] == $genero["id"]){
                        $generoPelicula = $genero;
                   }
                }
                
                $vacPeliculas = compact("peliculas", "generoPelicula");
                $vacActores = compact("actores");
                
                
                return view("detallePelicula", $vacPeliculas, $vacActores);
            }
        }
    }

    public function peliculas() {
        $bdPeliculas = pelicula::all();
        $cantPeliculas = count($bdPeliculas);
        $aux;
        $j = 0;
        $ultimasPeliculas = [];
        $randomsPeliculas = [];
       
        // $ultimasPeliculas = $bdPeliculas->toArray();

        // for ($i = 0; $i < 5; $i++){
        //     $aux[] = $bdPeliculas[array_rand($ultimasPeliculas)];
            
        // }

        
        if ($cantPeliculas > 5){
            for ($i = ($cantPeliculas - 5); $i < $cantPeliculas; $i++){
                $ultimasPeliculas[] = $bdPeliculas[$i];
            }

        $ultimasPeliculas = array_reverse($ultimasPeliculas);
        // Numeros randoms para seleccionar 5 peliculas sin repetir
        $pos[] = rand(0, ($cantPeliculas-1));
        while ($j < 5){
            $aux = rand(0, ($cantPeliculas-1));
            if (in_array($aux, $pos)){
                continue;
            }
            else{
                $pos[] = $aux;
                $j++;
            }
        }

        // Seleccionamos 5 peliculas aleatorias desde $bdPeliculas
        for ($i = 0; $i < 5; $i++){
            $randomsPeliculas[] = $bdPeliculas[$pos[$i]];
        }

        }//END-IF
        else {
            $randomsPeliculas = $bdPeliculas;
            $ultimasPeliculas = $bdPeliculas;
        }

        $randomsPeliculas= compact("randomsPeliculas");
        $ultimasPeliculas = compact("ultimasPeliculas");
        return view("inicio", $ultimasPeliculas, $randomsPeliculas);
    }

    public function buscar(Request $dataForm) {
        $titulo  = $dataForm["tituloPelicula"] ;
        $arrayPeliculas = pelicula::where('title', 'LIKE', "%{$titulo}%")->paginate(5);
        $vac = compact("arrayPeliculas");

        return view("/listadoPeliculas", $vac);
    }

<<<<<<< Updated upstream
    public function agregar(Request $dataForm) {
        $reglas = [
            "title" => "string|min:3|unique:movies,title",
            "rating" => "numeric|min:0|max:10",
            "awards" => "integer|min:0",
            "release_date" => "date"  
        ];

        $mensajes = [
            "string" => "El campo :attribute debe ser un texto",
            "min" => "El campo :attribute debe tener un minimo de :min",
            "max" => "El campo :attribute debe tener un maximo de max",
            "date" => "El campo :attribute debe ser una fecha",
            "numeric" => "El campo :attribute debe ser un número",
            "integer" => "El campo :attribute debe ser un número entero",
            "unique" => "El campo :attribute se encuentra repetido"
        ];

        $this->validate($dataForm, $reglas, $mensajes);

        $nuevaPelicula = new Pelicula();

        $nuevaPelicula->title = $dataForm["title"];
        $nuevaPelicula->rating = $dataForm["rating"];
        $nuevaPelicula->awards = $dataForm["awards"];
        $nuevaPelicula->release_date = $dataForm["release_date"];

        $nuevaPelicula->save();

        return redirect("/listadoPeliculas");
    }

    public function listadoBorrar() {
        $usuarioLog = Auth::user();
        $arrayPeliculas = pelicula::paginate(5);
        $vac = compact("arrayPeliculas");
        $usuario = compact("usuarioLog");

        return view("borrarPelicula", $vac, $usuario);
    }

    public function borrar(Request $dataForm) {
        $pelicula = Pelicula::find($dataForm["id"]);

        $pelicula->delete();

        return redirect("/borrarPelicula");
    }

    public function buscarBorrar(Request $dataForm) {
        $titulo  = $dataForm["tituloPelicula"];
        $arrayPeliculas = pelicula::where('title', 'LIKE', "%{$titulo}%")->paginate(5);
        $vac = compact("arrayPeliculas");

        return view("/borrarPelicula", $vac);
    }

    public function listadoActualizar() {
        $usuarioLog = Auth::user();
        $arrayPeliculas = pelicula::paginate(5);
        $vac = compact("arrayPeliculas");
        $usuario = compact("usuarioLog");

        return view("actualizarPelicula", $vac, $usuario);
    }

    public function buscarActualizar(Request $dataForm) {
        $titulo  = $dataForm["tituloPelicula"];
        $arrayPeliculas = pelicula::where('title', 'LIKE', "%{$titulo}%")->paginate(5);
        $vac = compact("arrayPeliculas");

        return view("/actualizarPelicula", $vac);
    }

    public function peliculaAActualizar(Request $dataForm) {
        $id = $dataForm["id"];
        $pelicula = Pelicula::find($id);
        $vac = compact("pelicula");

        return view("/formActualizar", $vac);
    }

    public function actualizar(Request $dataForm) {

        $reglas = [
            "title" => "string|min:3",
            "rating" => "numeric|min:0|max:10",
            "awards" => "integer|min:0",
            "release_date" => "date"  
        ];

        $mensajes = [
            "string" => "El campo :attribute debe ser un texto",
            "min" => "El campo :attribute debe tener un minimo de :min",
            "max" => "El campo :attribute debe tener un maximo de max",
            "date" => "El campo :attribute debe ser una fecha",
            "numeric" => "El campo :attribute debe ser un número",
            "integer" => "El campo :attribute debe ser un número entero"
        ];

        $this->validate($dataForm, $reglas, $mensajes);

        $id = $dataForm["id"];
        $nuevaPelicula = Pelicula::find($id);

        $nuevaPelicula->title = $dataForm["title"];
        $nuevaPelicula->rating = $dataForm["rating"];
        $nuevaPelicula->awards = $dataForm["awards"];
        $nuevaPelicula->release_date = $dataForm["release_date"];

        $nuevaPelicula->save();

        return redirect("/actualizarPelicula");
=======
    public function listadoAPI(){
        $bdPeliculas = pelicula::all();
        
        return json_encode($bdPeliculas);
>>>>>>> Stashed changes
    }
}
