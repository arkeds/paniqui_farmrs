<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class AnimalController extends Controller
{
    //
    public function index(){
    	$animals = Animal::paginate(10);
    	return view('animals.index')->with(['animals' => $animals]);
    }

    public function store(Request $request){
    	$animal = new Animal();
    	$animal->description = strtoupper($request->animal_name);
    	$animal->save();
    	return redirect("/animals")->with('message', 'Farm Animal Added.');
    }

    public function update($id, Request $request){
        $animal = Animal::findOrFail($id);
        $animal->description = $request->animal_name ? $request->animal_name : $animal->description;
        $animal->save();
        return redirect('/animals')->with('message', 'Animal Updated');
    }
}
