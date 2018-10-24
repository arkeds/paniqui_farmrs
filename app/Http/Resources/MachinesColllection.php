<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MachinesColllection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
             'data' => $this->collection->where('is_accessory', 0)->transform(function($machine){
                return [
                    'code' => $machine->id,
                    'machine' => $machine->machCode.'::'.$machine->machName,
                    'unit_capacity' => $machine->machUnit ? $machine->machUnit : " "
                ];
            }),
        ];
        
    }
}
