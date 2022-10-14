<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BatteryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Battery_Capacity'=>$this->Battery_Capacity,
            'Type_Battery'=>$this->Type_Battery,
            'Support_Charger'=>$this->Support_Charger,
            'Charger_With_Phone'=>$this->Charger_With_Phone,
            'Battery_Technology'=>$this->Battery_Technology,
        ];
    }
}
