<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FarmerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return [
             'data' => $this->collection->transform(function($farmer){
                $date =  new \DateTime($farmer->created_at);
                return [
                    'name' => $farmer->coop,
                    'owner_type' => $farmer->get_owner_type(),
                    'address' => $farmer->house,
                    'barangay' => $farmer->barangay->name,
                    'registered_at' => $date->format('Y-m-d')
                ];
            }),
        ];;
    }
}
