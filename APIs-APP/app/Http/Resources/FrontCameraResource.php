<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FrontCameraResource extends JsonResource
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
            "Deck_Font_Camera" => $this->Deck_Font_Camera,
            "Function_Font_Camera" => explode(',',$this->Function_Font_Camera),
        ];
    }
}
