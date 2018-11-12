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
        // 
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
        $croppingEntry->water_source = $request->water_source;
        $croppingEntry->variation = $request->crop_variation;
    	$croppingEntry->created_at = Carbon::now();
        $croppingEntry->created_by = Auth::user()->id;
    	$croppingEntry->save();
    	return redirect("/farms/".$id)->with('message', 'Cropping Entry Saved');
    }

    public function view($id){
        $crops = Crop::orderBy('description')->get();
        $cropping = Cropping::findOrFail($id);
        return view('croppings.edit', ['crops' => $crops, 'cropping' => $cropping]);
    }

    public function update($id, Request $request){
        $croppingEntry = Cropping::findOrFail($id);
        $croppingEntry->cropping_no = $request->crop_no ? $request->crop_no : $croppingEntry->cropping_no;
        $croppingEntry->crop_id = $request->crop_id ? $request->crop_no : $croppingEntry->cropping_no;
        $croppingEntry->crop_area = $request->crop_area ? $request->crop_area : $croppingEntry->crop_area;
        $croppingEntry->planting_date = $request->crop_date ? $request->crop_date : $croppingEntry->planting_date;
        $croppingEntry->water_source = $request->water_source ? $request->water_source : $croppingEntry->water_source;
        $croppingEntry->variation = $request->crop_variation ? $request->crop_variation : $croppingEntry->variation;
        $croppingEntry->save();
        return redirect("/farms/".$croppingEntry->farm_id)->with('message', 'Cropping Entry Updated');
    }
    public function delete($id){
        $cropping = Cropping::find($id);
        $cropping->delete();
        return redirect()->back()->with('message', 'Cropping Entry Deleted');
    }
}
