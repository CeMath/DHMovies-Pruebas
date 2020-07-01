<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;

class PeliculasController extends Controller
{
    public function listado() {
        $peliculas = pelicula::all();
        $vac = compact("peliculas");

        return view("listadoPeliculas", $vac);
    }

    public function detalle($id){
        $vac = compact("id");
        
        return view("detallePelicula", $vac);
    }
}
