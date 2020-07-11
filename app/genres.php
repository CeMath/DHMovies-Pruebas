<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    public $table = "genres";
    public $primaryKey = "id";
    public $timestamps = false;
    public $guarded = [];

    public function peliculas(){
        return $this->hasMany("App\Pelicula", "genre_id");
    }
}
