<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineList extends Model
{
    //
    protected $table = "machines_list";
    protected $fillable = ["machCode", "machName", "machType", "machPurpose", "machUnit", "is_accessory"];
    public $timestamps = false;


    public function purpose(){
    	return $this->hasOne('App\MachinePurpose', "id", "machPurpose");
    }

    public function type(){
        return $this->hasOne('App\MachineTypes', "id", "machType");
    }

    public function codeList(){
    	return $this->hasMany('App\OwnerMachines', 'machine_id', 'id');
    }

    public function codedName(){
        return $this->machCode."::".$this->machName;
    }

    public function accessory(){
        if($this->is_accessory){
            return "Accessory";
        }
        return "Machine/Equipment";
    }


}
