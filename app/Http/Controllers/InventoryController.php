<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OwnerMachines;
use App\MachineList;
use DB;

class InventoryController extends Controller
{
    //
    public function index(){
    	$machines = OwnerMachines::leftJoin('machines_list', 'machines_list.id', '=', 'registered_machines.machine_id')
    					->paginate(10);
    	return view('inventory.index', ['machines' => $machines]);
    }

    public function list($code){
    	$machines = OwnerMachines::leftJoin('machines_list', 'machines_list.id', '=', 'registered_machines.machine_id')
    								->where('machCode', $code)
    								->get();

    	return view('inventory.list', ['machines' => $machines]);
    }

    
}
