<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailOrderResource extends JsonResource
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
            "ID_Detais_Order"=>$this->ID_Detais_Order,
            "ID_Order"=>$this->ID_Order,
            "ID_Product"=>$this->ID_Product,
            "Amount"=>$this->Amount,
            "Total_Money"=>number_format($this->Total_Money),
        ];
    }
}
