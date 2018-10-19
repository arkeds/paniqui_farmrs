<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    //
    protected $table = "engines";
    protected $fillable = ["serial", "brand", "acquire_mode", "acquisition_year", "rated_power", "machine_id"];
    public $timestamps = false;
    protected $primaryKey = 'machId';
}
