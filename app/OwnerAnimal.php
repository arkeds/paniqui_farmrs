<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerAnimal extends Model
{
    //
    protected $table = 'owner_animals';
    protected $fillable = ["id", "owner_id", "animal_id", "animal_count", "commercial_count"];
    public $timestamps = false;

    public function animalType(){
    	return $this->belongsTo('App\Animal', 'animal_id');
    }

    public function owner(){
    	return $this->belongsTo('App\Owner', 'owner_id', 'id');
    }
}
