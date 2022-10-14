<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProducerResource extends JsonResource
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
            //'ID_Producer'=>$this->ID_Product,
            'Name_Producer '=>$this->Name_Producer,
            'Email_Producer '=>$this->Email_Producer ,
            'Phone_Producer'=>$this->Phone_Producer,
            'Address_Producer'=>$this->Address_Producer,
        ];
    }
}
