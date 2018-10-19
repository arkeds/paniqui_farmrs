<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    //
    protected $primaryKey = "code";
    protected $fillable = ["code", "name" ,"region_code"];
    public $timestamps = false;

    public function region(){
    	return $this->belongsTo('App\Region', 'region_code', 'code');
    }
    
}
