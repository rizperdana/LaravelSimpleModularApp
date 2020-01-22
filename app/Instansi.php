<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    //Make simple form using these column
    protected $fillable = [
     'instansi',
     'description',
    ];
}
