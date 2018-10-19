<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crop;

class CropController extends Controller
{
    //
    public function index(){
    	$crops = Crop::paginate(10);
    	return view('crops.index')->with(['crops' => $crops]);
    }

    public function store(Request $request){
    	$crop = new Crop();
    	$crop->description = strtoupper($request->crop_name);
    	$crop->save();
	return redirect("/crops")->with('message', 'Farm Crop Added.');
    }
}
