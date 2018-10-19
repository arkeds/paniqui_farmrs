<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\MachinesColllection;
use App\MachinePurpose;

class MachinePurposeController extends Controller
{
    //

    public function machines($purpose){
    	$machine_purpose = MachinePurpose::findOrFail($purpose);
    	return new MachinesColllection($machine_purpose->machines);
    	//return response()->json({})
    }
}
