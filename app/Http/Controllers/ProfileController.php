<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

use App\User;


class ProfileController extends Controller
{
    //
    public function index(){
    	return view('account.profile');
    }

    public function profile(Request $request){
    	$user = User::findOrFail(Auth::user()->id);
    	$user->firstname = $request->firstname ? $request->firstname : $user->firstname;
    	$user->middlename = $request->middlename ? $request->middlename : $user->middlename;
    	$user->lastname = $request->lastname ? $request->lastname : $user->lastname;
    	$user->designation = $request->designation ? $request->designation : $user->designation;
    	$user->contact = $request->contact ? $request->contact : $user->contact;
    	$user->address = $request->address ? $request->address : $user->address;
    	$user->birthdate = $request->birthdate ? $request->birthdate : $user->birthdate;
    	$user->save();
    	
    	return redirect('/profile')->with('message', 'Profile Details Updated.');
    }

    public function auth(Request $request){
    	$user = User::findOrFail(Auth::user()->id);
    	$user->username = $request->username ? $request->username : $user->username;
    	$user->password = $request->password ? Hash::make($request->password) : $user->password;
    	$user->save();
    	
    	return redirect('/profile')->with('message', 'Login Details Updated.');
    }
}
