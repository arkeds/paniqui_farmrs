<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFarmerRequest;
use App\Barangay;
use App\Owner;
use App\OwnerProfile;
use Input;

class OwnerController extends Controller
{
    //
    public function index(Request $request){
        $search = "%".$request->search."%";
        if (!$search){
            $owners = Owner::orderBy('created_at', 'desc')->paginate(10);    
        }else {
            $owners = Owner::where('coop','like', $search)->orderBy('created_at', 'desc')->paginate(10);
        }
        

    	return view('owners.list', ['owners' => $owners]);
    }

    public function create(){
        $barangays = Barangay::where("citymun_code", $this->municipality)->get();
        //print_r($barangays);
    	return view("owners.create")->with(['barangays' =>$barangays]);
    }

    public function store(StoreFarmerRequest $request){
        
        \DB::transaction(function () use ($request) {
            $owner_id = $this->create_id();

            //dd($request->all());
            $oOwner = new Owner();
            $oOwner->id = $owner_id;
            $oOwner->owner_type = $request->owner_type;
            if($request->owner_type == "C"){
                $coopname = $request->cooperative;
            }else {
                $coopname = $request->firstname.' '.$request->middlename.' '.$request->lastname;
            }

            $oOwner->coop = strtoupper($coopname);
            $oOwner->house = strtoupper($request->address);
            $oOwner->brgy = $request->barangay;

            $oProfile = new OwnerProfile();
            $oProfile->id = $owner_id;
            $oProfile->fName = strtoupper($request->firstname);
            $oProfile->mName = strtoupper($request->middlename);
            $oProfile->lName = strtoupper($request->lastname);
            $oProfile->xName = strtoupper($request->extension);
            $oProfile->gender = strtoupper($request->gender);
            $oProfile->birthdate = $request->birthdate;
            $oProfile->contact = $request->contact;
            $oProfile->civil_status = $request->civil_status;
            $oProfile->education = $request->education;
        
            $oOwner->save();
            $oProfile->save();
        });
        
        return redirect("farmers/create")->with('message', 'Farmer has been registered.');
    }

    public function edit($id){
        $barangays = Barangay::where("citymun_code", $this->municipality)->get();
        $owner =  Owner::findOrFail($id);
        return view('owners.edit', ['owner' => $owner, 'barangays' => $barangays]);
    }

    public function update($id, Request $request){
        $owner = Owner::findOrFail($id);

        \DB::transaction(function () use ($request, $id) {
            
            $oOwner = Owner::find($id);
            $oOwner->owner_type = $request->owner_type ? $request->owner_type : $oOwner->owner_type;
            if($request->owner_type == "C"){
                $coopname = $request->cooperative ? $request->cooperative : $oOwner->coop;
            }else {
                $coopname = $request->firstname.' '.$request->middlename.' '.$request->lastname;
            }

            $oOwner->coop = strtoupper($coopname);
            $oOwner->house = $request->address ? strtoupper($request->address) : $oOwner->house;
            $oOwner->brgy = $request->barangay ? $request->barangay : $oOwner->brgy;

            $oProfile = OwnerProfile::find($id);
            
            $oProfile->fName = $request->firstname ? strtoupper($request->firstname) : $oProfile->fName;
            $oProfile->mName = $request->middlename ? strtoupper($request->middlename) : $oProfile->mName;
            $oProfile->lName = $request->lastname ? strtoupper($request->lastname) : $oProfile->lName;
            $oProfile->xName = strtoupper($request->extension);
            $oProfile->gender = $request->gender ? strtoupper($request->gender) : $oProfile->gender;
            $oProfile->birthdate = $request->birthdate ? $request->birthdate : $oProfile->birthdate;
            $oProfile->contact = $request->contact ? $request->contact : $oProfile->contact;
            $oProfile->civil_status = $request->civil_status ? $request->civil_status : $oProfile->civil_status;
            $oProfile->education = $request->education ? $request->education : $oProfile->education;
        
            $oOwner->save();
            $oProfile->save();
        });

        return redirect("/farmers/".$id."/profile")->with('message', 'Farmer Information Updated');
    }





    public function show($id, Request $request){
        $owner =  Owner::findOrFail($id);

        return view('owners.profile')->with(['owner' => $owner]);
    }

    private function create_id(){
        $date = date_format(Now(),'Ym');
        $zerofill = substr("0000". mt_rand(1, 9999), -4);
        $created_id = $date.$zerofill; 
        $id = Owner::find($created_id);
        if($id){
           $this->create_id(); 
        }else{
            return $created_id;
        }
        
    }
}
