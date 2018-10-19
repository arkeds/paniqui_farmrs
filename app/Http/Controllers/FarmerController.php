<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use App\Animal;
use App\Tree;
use App\OwnerAnimal;
use App\OwnerTree;

class FarmerController extends Controller
{
    //
    public function index($id){
    	return view('owners.farm_profile');
    }

    public function show($id){
    	$farmer = Owner::findOrFail($id);
    	$animals = Animal::orderBy('description')->get();
    	$trees = Tree::orderBy('description')->get();
    	return view('owners.farm_profile')->with(
    		[
    			'farmer' => $farmer,
    			'animals'=> $animals,
    			'trees' => $trees
    		]);
    }


    public function storeAnimal($id, Request $request){
    	$farmer = Owner::findOrFail($id);
    	
    	$matchCase = ['owner_id' => $request->farmer_id, 'animal_id' => $request->animal_id];

    	//check if animal exists then update
        //else create record
    	$existAnimal = OwnerAnimal::where($matchCase)->first();
    	if ($existAnimal){
    		$animal = OwnerAnimal::where($matchCase)->first();
    		$animal->animal_count = $request->animal_count;
    		$animal->save();
    	}else{
    		$farmAnimal = new OwnerAnimal();
    		$farmAnimal->owner_id = $request->farmer_id;
    		$farmAnimal->animal_id = $request->animal_id;
    		$farmAnimal->animal_count = $request->animal_count ? $request->animal_count : 0;
    		$farmAnimal->save();
    	}
    	
    	return redirect("/farmers/".$request->farmer_id."/farm-data")->with('message', 'Farm Animal Added.');
    }

    public function storeTree($id, Request $request){
    	$farmer = Owner::findOrFail($id);
    	
    	$matchCase = ['owner_id' => $request->farmer_id, 'tree_id' => $request->tree_id];

    	//check if tree exists then update
    	$existTree = OwnerTree::where($matchCase)->first();
    	if ($existTree){
    		$tree = OwnerTree::where($matchCase)->first();
    		$tree->bearing = $request->bearing;
    		$tree->non_bearing = $request->non_bearing;
    		$tree->save();
    	}else{
    		$farmTree = new OwnerTree();
    		$farmTree->owner_id = $request->farmer_id;
    		$farmTree->tree_id = $request->tree_id;
    		$farmTree->bearing = $request->bearing ? $request->bearing : 0 ;
    		$farmTree->non_bearing = $request->non_bearing ? $request->non_bearing : 0;
    		$farmTree->save();
    	}
    	
    	return redirect("/farmers/".$request->farmer_id."/farm-data")->with('message', 'Farm Tree Added.');
    }
}
