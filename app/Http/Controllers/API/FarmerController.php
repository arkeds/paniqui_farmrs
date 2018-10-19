<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FarmerCollection;
use App\Owner;

class FarmerController extends Controller
{
    //
    public function index(){
    	$owners = Owner::orderBy('created_at', 'desc')->paginate(10);
    	return new FarmerCollection($owners);
    }
}
