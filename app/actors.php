<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actors extends Model
{
    public $table = "actors";
    public $primaryKey = "id";
    public $timestamps = false;
    public $guarded = [];
}
