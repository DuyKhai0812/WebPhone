<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DisplayResource extends JsonResource
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
            'Resolution '=>$this->Resolution ,
            'Widescreen'=>$this->Widescreen,
            'Maximum_Light'=>$this->Maximum_Light,
            'Type_Screen'=>$this->Type_Screen,
            'Screen_Technology'=>$this->Type_Screen,
        ];
    }
}
