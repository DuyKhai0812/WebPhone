<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OSResource extends JsonResource
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
            'OS'=>$this->OS,
            'CPU'=>$this->CPU,
            'Speed_CPU'=>$this->Speed_CPU,
            'Speed_GPU'=>$this->Speed_GPU
        ];
    }
}
