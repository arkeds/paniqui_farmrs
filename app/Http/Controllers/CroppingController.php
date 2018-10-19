<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\FarmerFarm;
use App\Crop;
use App\Cropping;


class CroppingController extends Controller
{
    //
	public function index(){
        
    }

    public function create($id){
    	$farm = FarmerFarm::findOrFail($id);
    	$crops = Crop::orderBy('description')->get();
    	return view('croppings.create', ['farm' => $farm, 'crops' => $crops]);
    }

    public function store($id, Request $request){
    	$farm = FarmerFarm::findOrFail($id);
    	$croppingEntry = new Cropping();
    	$croppingEntry->farm_id = $id;
    	$croppingEntry->cropping_no = $request->crop_no;
    	$croppingEntry->crop_id = $request->crop_id;
    	$croppingEntry->crop_area = $request->crop_area;
    	$croppingEntry->planting_date = $request->crop_date;
    	$croppingEntry->created_at = Carbon::now();
        $croppingEntry->created_by = Auth::user()->id;
    	$croppingEntry->save();
    	return redirect("/farms/".$id)->with('message', 'Cropping Entry Saved');
    }
}
