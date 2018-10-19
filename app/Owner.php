<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //
    protected $table = 'owners';
    protected $fillable = ["id", "owner_type", "coop", "house", "brgy", "created_at", "created_by"];
    public $timestamps = false;


    public function get_owner_type(){
    	if ($this->owner_type == "P"){
    		return "Private Individual";
    	}elseif ($this->owner_type == "C"){
    		return "Cooperative/Assocation";
    	}else{
    		return "Cooperative/Assocation";
    	}
    }

    public function isAssocation(){
    	if ($this->owner_type == "P"){
    		return false;
    	}elseif ($this->owner_type == "C"){
    		return true;
    	}else{
    		return true;
    	}
    }

    public function barangay(){
    	return $this->belongsTo('App\Barangay', 'brgy', 'code');
    }

    public function registeredDate(){
        $date =  new \DateTime($this->created_at);
    	return date_format($date,'Y-m-d');
    }

    public function profile(){
    	return $this->hasOne('App\OwnerProfile', 'id', 'id');
    }

    public function relations(){
        return $this->hasMany('App\OwnerRelations', 'owners_id');
    }

    public function animals(){
        return $this->hasMany('App\OwnerAnimal', 'owner_id');
    }

    public function trees(){
        return $this->hasMany('App\OwnerTree', 'owner_id');
    }

    public function farms(){
        return $this->hasMany('App\FarmerFarm', 'owner_id');
    }
}
