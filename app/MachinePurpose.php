<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachinePurpose extends Model
{
    //
    protected $table = "machine_purpose";
    protected $fillable = ["id", "description"];
    public $timestamps = false;

    public function machines(){
    	return $this->hasMany('App\MachineList', "machPurpose");
    }
}
