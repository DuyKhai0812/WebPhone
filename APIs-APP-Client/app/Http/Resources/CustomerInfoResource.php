<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerInfoResource extends JsonResource
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
            //'Account'=>$this->Account,
            'Name_Customer'=>$this->Name_Customer,
            'Create_Date'=>$this->Create_Date,
            'ID_Group_Customer'=>$this->ID_Group_Customer,
            'Birth_Day'=>$this->Birth_Day,
            'Phone_Customer'=>$this->Phone_Customer,
            'Sex'=>$this->Sex,
            'Email_Customer'=>$this->Email_Customer,
            'Active'=>$this->Active,
        ];
    }
}
