<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Resources\FarmerCollection;
use DB;
use App\OwnerMachines;
use App\Owner;
use App\Barangay;

class ReportsController extends Controller
{
    //
    public function index(){
    	return view('reports.index');
    }

    public function inventory(){
       return view('reports.inventory-list');
    }

    public function getInventory(){
        $machines = OwnerMachines::leftJoin('machines_list', 'machines_list.id', '=', 'registered_machines.machine_id')->get();
        
        $machineCollection = $machines->transform(function($machine){
            $date =  new \DateTime($machine->created_at); //transform date string to date
            return [
                'machine' => $machine->machName,
                'capacity' => $machine->capacity ? $machine->capacity.' '.$machine->machUnit : "N/A",
                'owner' => $machine->owner->coop,
                'supplier' => $machine->supplier,
                'acq_year' => $machine->acquisition_year,
                'registered_at' => $date->format('Y-M-d')
            ];
        });
        return Datatables::of($machineCollection)->make(true);
    }


    public function inventoryCount(){
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
    	return view('reports.inventory', ['machines' => $machines]);
    }

    public function machines($code){
        $machines = OwnerMachines::leftJoin('machines_list', 'machines_list.id', '=', 'registered_machines.machine_id')
                                    ->where('machCode', $code)
                                    ->get();
        return view('inventory.list', ['machines' => $machines]);
        
    }

    public function farmers(){
        return view('reports.farmers-list');
    }

    ///used for datatable
    public function getFarmers(){
        $farmers = Owner::orderBy('created_at', 'DESC')->get();
        
        $farmerCollection = $farmers->transform(function($farmer){
            $date =  new \DateTime($farmer->created_at); //transform date string to date
            return [
                'name' => $farmer->coop,
                'owner_type' => $farmer->get_owner_type(),
                'address' => $farmer->house,
                'barangay' => $farmer->barangay->name,
                'registered_at' => $date->format('Y-M-d')
            ];
        });
        return Datatables::of($farmerCollection)->make(true);
    }


    //owners per barangay
    public function farmerBarangays(){
        $barangay_owners_count = Barangay::select(DB::raw('barangays.code, barangays.name as `brgy`, COUNT(owners.id) as `total`'))
                                    ->rightJoin('owners', 'owners.brgy', '=', 'barangays.code')
                                    ->groupBy(['barangays.name', 'barangays.code'])
                                    ->get();
        return  view('reports.barangay-owners', ['barangay_owners_count' => $barangay_owners_count]);
    }

    public function barangayFarmers($brgy){
        $barangay = Barangay::findOrFail($brgy);
        return view('reports.owners-barangay', ['barangay' => $barangay]);
    }

    public function barangayMachines(){
        $barangay_machines = Barangay::select(DB::raw('barangays.code, barangays.name, COUNT(registered_machines.machine_id) as `total`'))
                                        ->leftJoin('owners', 'owners.brgy', '=', 'barangays.code')
                                        ->leftJoin('registered_machines', 'registered_machines.owner_id', '=', 'owners.id')
                                        ->where('barangays.citymun_code', '036910000') //psa code for paniqui tarlac
                                        ->groupBy(['barangays.name', 'barangays.code'])
                                        ->get();
        return view('reports.barangay-machines', ['barangay_machines' => $barangay_machines]);
    }

    public function machineBarangay($brgy){
        $barangay = Barangay::findOrFail($brgy);
        $barangay_machines = OwnerMachines::select(DB::raw('machines_list.machName, owners.coop, registered_machines.acquisition_year as `acq_yr`, CONCAT(registered_machines.capacity,\' \',machines_list.machUnit) as `capacity`, registered_machines.supplier '))
                                        ->leftJoin('owners', 'owners.id', '=', 'registered_machines.owner_id')
                                        ->leftJoin('barangays', 'barangays.code', '=', 'owners.brgy')
                                        ->leftJoin('machines_list', 'machines_list.id', '=', 'registered_machines.machine_id')
                                        ->where('owners.brgy', $brgy)
                                        ->get();

        return view('reports.machines-barangay', ['barangay' => $barangay,'barangay_machines' => $barangay_machines]);
    }
}
