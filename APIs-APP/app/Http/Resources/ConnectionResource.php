<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConnectionResource extends JsonResource
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
            'Mobile_Network'=>$this->Mobile_Network,
            'SIM'=>$this->SIM,
            'WIFI'=>explode(',',$this->WIFI),
            'GPS'=>explode(',',$this->GPS),
            'Bluetooth'=>explode(',',$this->Bluetooth),
            'Connector_Charger'=>$this->Connector_Charger,
            'Jack_Headphone'=>$this->Jack_Headphone,
        ];
    }
}
