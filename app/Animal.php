<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    //
    protected $table = 'animals';
    protected $fillable = ["description"];
    public $timestamps = false;
}
