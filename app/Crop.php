<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    //
    protected $table = "crops";
    protected $fillable = ["description"];
    public $timestamps = false;
}
