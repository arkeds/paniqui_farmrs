<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OwnerMachines;
use DB;

class DashboardController extends Controller
{
    //
    public function index(){
    	$machines = OwnerMachines::select(DB::raw('machines_list.machCode, machines_list.machName, 
                                    COUNT(CASE 
                                            WHEN registered_machines.status =\'F\' THEN 1 END
                                        ) as `functional`,
                                    COUNT(CASE 
                                            WHEN registered_machines.status = \'R\' THEN 1 END
                                        ) as `repair`, 
                                    COUNT(owner_id) as `total`')
                                    )
    					->leftJoin('machines_list', 'machines_list.id', '=', 'registered_machines.machine_id')
    					->groupBy(['machines_list.machName', 'machines_list.machCode'])
    					->get();
    	
    	return view('dashboard', ['machines' => $machines]);
    }
}
