<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


use App\Owner;
use App\MachinePurpose;
use App\OwnerMachines;
use App\MachineList;
use App\Engine;

class MachineController extends Controller
{
    //

    public function index($id){
    	$owner = Owner::findOrFail($id);
        $machines = OwnerMachines::where('owner_id', $owner->id)->get();
    	return view('machines.index', ['owner' => $owner, 'machines' => $machines]);
    }

    public function create($id){
    	$owner = Owner::findOrFail($id);
    	$machine_purposes = MachinePurpose::all();
    	return view('machines.create', [
    		'owner' => $owner,
    		'machine_purposes' => $machine_purposes
    	]);
    }

    public function store($id, Request $request){
        $owner = Owner::findOrFail($id);
        
        \DB::transaction(function () use ($request, $id) {
            $machine_id = $this->machineID();
            $has_engine = $request->has_engine ? 1 : 0;

            $machine = new OwnerMachines();
            $machine->machId = $machine_id;
            $machine->owner_id = $id;
            $machine->machine_id = $request->mach_name;
            $machine->serial = $request->mach_serial;
            $machine->brand = $request->mach_brand;
            $machine->capacity = $request->mach_capacity . $request->unit_text;
            $machine->acquire_mode = $request->mach_acqmode;
            $machine->acquisition_year = $request->mach_year;
            $machine->supplier = $request->mach_supplier;
            $machine->supplier_address = $request->supplier_address;
            $machine->created_at = Carbon::now();
            $machine->created_by = \Auth::user()->id;

            $machine->save();
            if ($has_engine){
                $engine = new Engine();
                $engine->serial = $request->eng_serial;
                $engine->brand = $request->eng_brand;
                $engine->acquire_mode = $request->eng_acqmode;
                $engine->acquisition_year = $request->eng_year;
                $engine->rated_power = $request->eng_rpower.$request->eng_runit;
                $engine->machine_id = $machine_id;
                $engine->save();
            }

            
            
        });
        
       
        return redirect("/farmers/".$id."/machines")->with('message', 'Machine Registered');
    }


    public function edit($farmer, $machine, Request $request){
        $case = ['machId' => $machine, 'owner_id' => $farmer];
        $farmer = Owner::findOrFail($farmer);
        $machine = OwnerMachines::where($case)->firstOrFail();
        $machines = MachineList::where('is_accessory', 0)->get();
        return view('machines.edit', ['owner' => $farmer, 'machines' => $machines, 'machine' => $machine]);
    }

    public function update($farmer, $machine, Request $request){

    }

    private function machineID(){
        $date = date_format(Now(),'Ym');
        $zerofill = substr("0000000000". mt_rand(1, 99999), -5);
        $created_id = $date.$zerofill; 
        $id = OwnerMachines::find($created_id);
        if($id){
           $this->machineID(); 
        }else{
            return $created_id;
        }
    }
}
