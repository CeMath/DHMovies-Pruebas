<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;

class PeliculasController extends Controller
{
    public function listado() {
        $arrayPeliculas = pelicula::all();
        $vac = compact("arrayPeliculas");

        return view("listadoPeliculas", $vac);
    }

    public function detalle($id) {
        $vac = compact("id");
        
        return view("detallePelicula", $vac);
    }

    public function peliculas() {
        $bdPeliculas = pelicula::all();
        $aux = count($bdPeliculas); // Cantidad de peliculas
        $i = $aux - 4;
        $nombrePeliculas = [];
        $ultimasPeliculas = [];
        $peliculasRandoms = [];

        foreach ($bdPeliculas as $pelicula) {
            $nombrePeliculas[] = $pelicula["title"];
            if ($pelicula["id"] == $i){
                $ultimasPeliculas[] = $pelicula["title"];
                $i++;
            }
        }

        for ($j = 0; $j < 5; $j++){
            $pos = rand(0, $aux);
            $peliculasRandoms[] = $nombrePeliculas[$pos];
        }

        $peliculasRandoms = compact("peliculasRandoms");
        $ultimasPeliculas = compact("ultimasPeliculas");
        return view("inicio", $ultimasPeliculas, $peliculasRandoms);
    }
}
