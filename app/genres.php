<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    public $table = "genres";
    public $primaryKey = "id";
    public $timestamps = false;
    public $guarded = [];
}
