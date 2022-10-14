<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RamResource extends JsonResource
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
            "Ram" =>$this->Ram,
            "Memory" =>$this->Memory,
            "Memory_Use" =>$this->Memory_Use,
            "Memory_Stick" =>$this->Memory_Stick,
            "Phone_Book" =>$this->Phone_Book,
        ];
    }
}
