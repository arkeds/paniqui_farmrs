<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cropping extends Model
{
    //
    protected $table = "croppings";
    protected $fillable = ["id", "farm_id", "cropping_no", "crop_id", "crop_area", "planting_date", "created_at", "created_by"];
    public $timestamps = false;

    public function landArea(){
    	return $this->crop_area." hectares";
    }

    public function cropOrder(){
    	$cropOrder = "";
    	switch ($this->cropping_no) {
    		case '1':
    			$cropOrder = "1st";
    			break;
    		case '2':
    			$cropOrder = "2nd";
    			break;
    		case '3':
    			$cropOrder = "3rd";
    			break;
    		default:
    			$cropOrder = "1st";
    			break;
    	}
    	return $cropOrder." Crop";
    }

    public function crop(){
        return $this->belongsTo('App\Crop', 'crop_id');
    }

    public function createdBy(){
        return $this->belongsTo('App\User', 'created_by');
    }
}
