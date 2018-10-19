<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Hash;

use App\User;

class UserController extends Controller
{
    //
    public function index(Request $request){
        $search = "%".$request->search."%";
    	//get encoders only
        $matchCase = ['is_admin' => 0, 'root' => 0];
        if (!$search){
            $users = User::where($matchCase)->orderBy('created_at', 'DESC')->paginate(10);
        }else {
            $users = User::where($matchCase)->where('username','like', $search)->orderBy('created_at', 'DESC')->paginate(10);
        }
    	
    	
    	return view('users.index', ['users' => $users]);
    }

    public function admin(){
    	$matchCase = ['is_admin' => 1, 'root' => 0];
    	$users = User::where($matchCase)->orderBy('created_at', 'DESC')->paginate(10);
    	return view('users.admin', ['users' => $users]);
    }

    public function create(){
    	return view('users.create');
    }

    public function store(StoreUserRequest $request){

        $validated = $request->validated();

    	$user = new User();
    	$user->username = $request->username;
    	$user->password = Hash::make($request->password);
    	$user->firstname = $request->firstname;
    	$user->middlename = $request->middlename;
    	$user->lastname = $request->lastname;
    	$user->designation = $request->designation;
    	$user->contact = $request->contact ? $request->contact : "";
    	$user->address = $request->address ? $request->address : "";
    	$user->birthdate = $request->birthdate;
    	$user->is_admin = $request->isang_admin_officer ? $request->isang_admin_officer : 0;
    	$user->save();
    	return redirect("/users");
    }

    public function show($id){
    	$matchCase = ['id' => $id, 'is_admin' => 0, 'root' => 0];
    	$user = User::where($matchCase)->firstOrFail();
    	return view('users.profile', ['user' => $user]);
    }

    public function showAdmin($id){
    	$matchCase = ['id' => $id, 'is_admin' => 1, 'root' => 0];
    	$user = User::where($matchCase)->firstOrFail();
    	return view('users.profile', ['user' => $user]);
    }

    public function status($id){
    	$user = User::findOrFail($id);
    	$user->is_active = !$user->is_active;
    	$user->save();
    	if (Auth::user()->root == 1){
    		return redirect()->back();
    	}
    	return redirect()->back();
    }

    public function profile($id, Request $request){
    	$user = User::findOrFail($id);
    	$user->firstname = $request->firstname ? $request->firstname : $user->firstname;
    	$user->middlename = $request->middlename ? $request->middlename : $user->middlename;
    	$user->lastname = $request->lastname ? $request->lastname : $user->lastname;
    	$user->designation = $request->designation ? $request->designation : $user->designation;
    	$user->contact = $request->contact ? $request->contact : $user->contact;
    	$user->address = $request->address ? $request->address : $user->address;
    	$user->birthdate = $request->birthdate ? $request->birthdate : $user->birthdate;
    	$user->save();
    	
    	return redirect()->back()->with('message', 'Profile Details Updated.');
    }

    //updates login details
    public function login($id, Request $request){
    	$user = User::findOrFail($id);
    	$user->username = $request->username ? $request->username : $user->username;
    	$user->password = $request->password ? Hash::make($request->password) : $user->password;
    	$user->save();
    	
    	return redirect()->back()->with('message', 'Login Details Updated.');
    }

}
