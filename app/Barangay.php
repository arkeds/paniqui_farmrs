<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    //
    protected $primaryKey = "code";
    public $incrementing = false;
    protected $fillable = ["code", "name", "citymun_code"];
    public $timestamps = false;

    public function owners(){
    	return $this->hasMany('App\Owner', 'brgy');
    }
}
