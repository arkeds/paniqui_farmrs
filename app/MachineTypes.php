<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineTypes extends Model
{
    //
    protected $table = "machine_types";
    protected $fillable = ["id", "description"];
    public $timestamps = false;

    public function machines(){
    	return $this->hasMany('App\MachineList', 'machType')->sortBy('machName');
    }

}
