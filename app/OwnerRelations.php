<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerRelations extends Model
{
    //
    protected $table = "owner_relations";
    protected $fillable = ["id", "owners_id", "name", "relationship", "birthdate"];
    public $timestamps = false;

    public function relationType(){
    	$relation = "";
    	switch ($this->relationship) {
    		case 'S':
    			$relation = "Spouse";
    			break;
    		case 'C':
    			$relation = "Child";
    			break;
    		case 'M':
    			$relation = "Association Member";
    			break;
    		default:
    			$relation = "Association Member";
    			break;
    	}
    	return $relation;
    }
}
