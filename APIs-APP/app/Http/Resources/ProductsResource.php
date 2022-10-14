<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'ID_Product'=>$this->ID_Product,
            'ID_Type_Products '=>$this->ID_Type_Products,
            'ID_Producer '=>$this->ID_Producer ,
            'Name_Product'=>$this->Name_Product,
            'Price'=>$this->Price,
            'Create_Date'=>$this->Create_Date,
            'Status'=>$this->Status,
            'Active'=>$this->Active,
        ];
    }
}
