<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CropResource;

use App\Crop;


class CropController extends Controller
{
    //
    public function show($id){
    	$crop = Crop::findOrFail($id);
    	
    	CropResource::withoutWrapping();
    	return new CropResource($crop);
    }
}
