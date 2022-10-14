<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BackCameraResource extends JsonResource
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
            'Deck_Back_Camera '=>$this->Deck_Back_Camera,
            'Flash '=>$this->Flash ,
            'Function_Back_Camera'=>explode(',',$this->Function_Back_Camera)
        ];
    }
}
