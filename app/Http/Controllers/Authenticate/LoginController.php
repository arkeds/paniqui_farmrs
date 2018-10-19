<?php

namespace App\Http\Controllers\Authenticate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;


class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request) {
    	$credentials = [
            'username' => $request->username,
            'password' => $request->password,
            'is_active'=> 1
        ];
        //Auth::attempt($credentials) && $user->is_active
        if(Auth::attempt($credentials)){
            $matchCase = ['username' => $request->username, 'is_active' => 1];
            $user = User::where($matchCase)->first();
            Auth::login($user);
            return redirect()->intended('dashboard');
        }

        return redirect()->back()->withInput()->with('status', 'Invalid username or password.');
    	

    	
    }

    public function logout(){
    	Auth::logout();
    	return redirect('login');
    }
}
