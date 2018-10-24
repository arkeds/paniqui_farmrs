<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tree;

class TreeController extends Controller
{
    //
    public function index(){
    	$trees = Tree::paginate(10);
    	return view('trees.index')->with(['trees' => $trees]);
    }

    public function store(Request $request){
    	$tree = new Tree();
    	$tree->description = strtoupper($request->tree_name);
    	$tree->save();
    	return redirect("/trees")->with('message', 'Farm Trees Added.');
    }

    public function update($id, Request $request){
        $tree = Tree::findOrFail($id);
        $tree->description = $request->tree_name ? $request->tree_name : $tree->description;
        $tree->save();
        return redirect('/trees')->with('message', 'Tree Updated');
    }
}
