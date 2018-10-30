<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineList extends Model
{
    //
    protected $table = "machines_list";
    protected $fillable = ["id", "machCode", "machName", "machType", "machPurpose", "machUnit", "is_accessory"];
    public $timestamps = false;


    public function purpose(){
    	return $this->hasOne('App\MachinePurpose', "id", "machPurpose");
    }

    public function codeList(){
    	return $this->hasMany('App\OwnerMachines', 'machine_id', 'id');
    }

    public function codedName(){
        return $this->machCode."::".$this->machName;
    }


}
