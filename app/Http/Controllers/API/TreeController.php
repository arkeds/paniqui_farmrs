<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TreeResource;

use App\Tree;

class TreeController extends Controller
{
    //
    public function show($id){
    	$tree = Tree::findOrFail($id);
    	TreeResource::withoutWrapping();
    	return new TreeResource($tree);
    }
}
