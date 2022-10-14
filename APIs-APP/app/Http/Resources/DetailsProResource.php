<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailsProResource extends JsonResource
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
            'Detail '=>$this->Detail,
            'Display '=>$this->Display ,
            'OS'=>$this->OS,
            'Font_Camera'=>$this->Font_Camera,
            'Back_Camera'=>$this->Back_Camera,
            'Ram'=>$this->Ram,
            'Memory_Phone'=>$this->Memory_Phone,
            'SIM'=>$this->SIM,
            'Pin'=>$this->Pin,
            'Charge'=>$this->Charge,
            'Brand'=>$this->Brand,
        ];
    }
}
