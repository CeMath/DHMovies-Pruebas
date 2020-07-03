<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actor_movie extends Model
{
    public $table = "actor_movie";
    public $primaryKey = "id";
    public $timestamps = false;
    public $guarded = [];
}
