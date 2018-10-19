<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    //
    protected $table = 'animals';
    protected $fillable = ["id", "description"];
    public $timestamps = false;
}
