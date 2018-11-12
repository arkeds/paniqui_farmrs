<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnerTree extends Model
{
    //
    protected $table = 'owner_trees';
    protected $fillable = ["id", "owner_id", "tree_id", "bearing", "non_bearing"];
    public $timestamps = false;

    public function treeType(){
    	return $this->belongsTo('App\Tree', 'tree_id');
    }

    public function owner(){
    	return $this->belongsTo('App\Owner', 'owner_id', 'id');
    }
}
