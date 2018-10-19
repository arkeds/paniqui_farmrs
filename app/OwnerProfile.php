<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerProfile extends Model
{
    //
    protected $table = "owners_profile";
    protected $fillable = ["id", "fName", "mName", "lName", "xName", "gender", "birthdate", "contact", "civil_status", "education"];
    public $timestamps = false;

    public function fullName(){
    	return $this->fName.' '.$this->mName.' '.$this->lName.' '.$this->xName;
    }

    public function formalName(){
    	return $this->lName.', '.$this->fName.' '.$this->xName.' '.$this->mName;
    }

    public function sex(){
    	if ($this->gender == "M"){
    		return "Male";
    	}elseif($this->gender == "F"){
    		return "Female";
    	}else{
    		return "Others";
    	}
    }

    public function civilStatus(){
        $status = "";
        switch ($this->civil_status) {
            case 'S':
                $status =  "Single";
                break;
            case 'M':
                $status =  "Married";
                break;
            case 'P':
                $status = "Separated";
                break;
            case 'W':
                $status = "Window/Widower";
                break;
            case 'L':
                $status = "Live-in";
                break;
            default:
                $status = "Single";
                break;
        }
        return $status;
    }
}
