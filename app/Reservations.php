<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        "debut",
        "fin",
        "hotel",
        "place",

    ];    
}
