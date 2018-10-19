<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerMachines extends Model
{
    //
    protected $table = "registered_machines";
    protected $fillable = ["machId", "owner_id", "machine_id", "serial", "brand", "capacity", "acquire_mode", 
    						"acquisition_year", "supplier", "supplier_address", "created_at",
    						"created_by", "status"];
    public $timestamps = false;
    protected $primaryKey = 'machId';

    public function machine(){
    	return $this->belongsTo('App\MachineList', 'machine_id', 'id');
    }

    public function engine(){
        return $this->hasOne('App\Engine', 'machine_id', 'machId');
    }


    public function machineStatus(){
        $status = "";
        switch ($this->status) {
            case 'F':
               $status = "Functional";
                break;
            case 'R':
                $status = "For Repair";
            default:
                $status = "Unknown";
                break;
        }
        return $status;
    }

    public function owner(){
        return $this->hasOne('App\Owner', 'id', 'owner_id');
    }

    public function unitCapacity(){
        return $this->capacity . $this->belongsTo('App\MachineList', 'machine_id', 'id')->machUnit;
    }

    public function acquisitionMode(){
        $mode = "";
        switch ($this->acquire_mode) {
            case 'CSH':
                $mode = "CASH";
                break;
            case 'GRT':
                $mode = "GRANT";
                break;
            case 'LON':
                $mode = "LOAN";
                break;
            case 'COS':
                $mode = "Cost-Sharing";
                break;
            default:
                $mode = "CASH";
                break;
        }
        return $mode;
    }

}
