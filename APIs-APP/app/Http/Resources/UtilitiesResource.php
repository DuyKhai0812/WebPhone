<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UtilitiesResource extends JsonResource
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
            "Security"=>$this->Security,
            "Special_Function"=>explode(',',$this->Special_Function),
            "Water"=>$this->Water,
            "Record"=>$this->Record,
            "Radio"=>$this->Radio,
            "Movie"=>explode(',',$this->Movie),
            "Music"=>explode(',',$this->Music),
        ];
    }
}
