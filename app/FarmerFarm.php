<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmerFarm extends Model
{
    //
    protected $table = 'farmer_farms';
    protected $fillable = ["id", "owner_id", "brgy_id", "sitio", "tenurial_status", "land_owner", "validity_date", "created_at"];
    public $timestamps = false;

    public function farmer(){
    	return $this->belongsTo('App\Owner');
    }

    public function barangay(){
    	return $this->belongsTo('App\Barangay', 'brgy_id', 'code');
    }

    public function tenurialStatus(){
    	$status = "";
    	switch ($this->tenurial_status) {
    		case 'O':
    			$status = "OWNED";
    			break;
    		case 'T':
    			$status = "TENANT";
    			break;
    		case 'R':
    			$status = "RENT";
    			break;
    		default:
    			$status = "OWNED";
    			break;
    	}
    	return $status;
    }

    public function farmLocation(){
    	if (is_null($this->brgy_id)){
    		return $this->sitio;
    	}else {
    		return $this->sitio.", Brgy. ".$this->barangay->name;
    	}
    }

    public function croppings(){
        return $this->hasMany('App\Cropping', 'farm_id');
    }

    
}
