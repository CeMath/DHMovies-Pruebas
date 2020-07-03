<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Pelicula;
use App\genres;
use App\actors;
use App\actor_movie;


class PeliculasController extends Controller
{
    public function listado() {
        $arrayPeliculas = pelicula::paginate(5);
        $vac = compact("arrayPeliculas");

        return view("listadoPeliculas", $vac);
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

        if ($cantPeliculas > 5){
            for ($i = ($cantPeliculas - 5); $i < $cantPeliculas; $i++){
                $ultimasPeliculas[] = $bdPeliculas[$i];
            }

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

    public function buscar() {
        $titulo  = input::get('tituloPelicula') ;
        $arrayPeliculas = pelicula::where('title', 'LIKE', "%{$titulo}%")->paginate(5);
        $vac = compact("arrayPeliculas");

        return view("/listadoPeliculas", $vac);
    }
}
