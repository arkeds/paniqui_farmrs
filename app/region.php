<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    protected $primaryKey = "code";
    public $incrementing = false;
    protected $fillable = ["code", "name"];
    public $timestamps = false;
}
