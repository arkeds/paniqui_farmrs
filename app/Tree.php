<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    //
    protected $table = "trees";
    protected $fillable = ["id", "description"];
    public $timestamps = false;
}
