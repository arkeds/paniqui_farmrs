<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Owner;
use App\Barangay;
use App\FarmerFarm;

class FarmController extends Controller
{
    //
    public function index($id){
    	$farmer = Owner::findOrFail($id);
    	return view('farms.index')->with(['farmer' => $farmer]);
    }


    public function create($id){
    	$farmer = Owner::findOrFail($id);
    	$barangays = Barangay::where("citymun_code", $this->municipality)->get();
    	return view('farms.create', [
    		'farmer' => $farmer,
    		'barangays' => $barangays

    	]);
    }

    public function store($id, Request $request){
        //dd($request->all());
        $farmer = Owner::findOrFail($id);
    	$farm = new FarmerFarm();
        $farm->owner_id = $id;
        $farm->brgy_id = $request->brgy ? $request->brgy : null;
        $farm->sitio = $request->sitio;
        $farm->tenurial_status = $request->tenurial;
        $farm->land_owner = $request->land_owner ? $request->land_owner : $farmer->coop;
        $farm->validity_date = $request->validity_date ? $request->validity_date : null;
        $farm->created_at = Carbon::now();
        $farm->save();

        return redirect("/farmers/".$farmer->id."/farms")->with('message', 'Farm Location Added.');
    }

    public function show($id){
        $farm = FarmerFarm::findOrFail($id);
        return view('farms.view', ['farm' => $farm]);
    }
}
