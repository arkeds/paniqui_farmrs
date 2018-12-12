<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MachineList;
use App\MachineTypes;
use App\MachinePurpose;


class MachineEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machine_equiment = MachineList::all();
        return view('machine_equipment.index', ['machine_equiment' => $machine_equiment]);
    }

    public function create(){
        $types = MachineTypes::all();
        $purposes = MachinePurpose::all();
        return view('machine_equipment.create', 
                        [
                            'types' => $types,
                            'purposes' => $purposes
                        ]);
    }

    public function save(Request $request){
        $machine = new MachineList;
        $machine->machCode = $request->code ? $request->code : $machine->machCode;
        $machine->machName = $request->machine ? $request->machine : $machine->machName;
        $machine->machType = $request->type ? $request->type : $machine->machType;
        $machine->machPurpose = $request->purpose ? $request->purpose : $machine->machPurpose;
        $machine->machUnit = $request->unit ? $request->unit : $machine->machUnit;
        $machine->is_accessory = $request->is_accessory ? $request->is_accessory : $machine->is_accessory;
        $machine->save();

        return redirect("/machine-equipment")->with('message', "Machine $request->code has been created");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $machine = MachineList::findOrFail($id);
        $types = MachineTypes::all();
        $purposes = MachinePurpose::all();
        return view('machine_equipment.edit', 
                        [
                            'machine' => $machine,
                            'types' => $types,
                            'purposes' => $purposes
                        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $machine = MachineList::findOrFail($id);
        $machine->machCode = $request->code ? $request->code : $machine->machCode;
        $machine->machName = $request->machine ? $request->machine : $machine->machName;
        $machine->machType = $request->type ? $request->type : $machine->machType;
        $machine->machPurpose = $request->purpose ? $request->purpose : $machine->machPurpose;
        $machine->machUnit = $request->unit ? $request->unit : $machine->machUnit;
        $machine->is_accessory = $request->is_accessory ? $request->is_accessory : $machine->is_accessory;
        $machine->save();

        return redirect("/machine-equipment")->with('message', "Machine $request->code has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
