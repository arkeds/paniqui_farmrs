<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OwnerRelations;

class OwnerRelationsController extends Controller
{
    //saves new owner relations
    public function store(Request $request){
    	$relation = new OwnerRelations();
    	$relation->owners_id = $request->owner_id;
    	$relation->name = strtoupper($request->member_name);
    	$relation->relationship = $request->relationship;
    	$relation->birthdate = $request->member_birth;

    	$relation->save();
		return redirect('/farmers/'.$request->owner_id.'/profile')->with('message', 'New Member Added');
    }


    public function destroy($id, Request $request){
        $ex = OwnerRelations::findOrFail($id);
        //$deleteCase = ['id' => $id, 'owners_id' => $request->farmer_id];
        $ex->delete();
        return redirect("/farmers/".$request->farmer_id."/profile")->with('message', 'Relationship Deleted');
        
    }
}
