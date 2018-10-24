<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnimalResource;

use App\Animal;

class AnimalController extends Controller
{
    public function show($id){
    	$animal = Animal::findOrFail($id);
    	AnimalResource::withoutWrapping();
    	return new AnimalResource($animal);
    }
}
