<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class citymun extends Model
{
    //
    //protected $primaryKey = "code";
    protected $fillable = ["code", "name", "district", "zipcode", "prov_code"];
    public $timestamps = false;
}
