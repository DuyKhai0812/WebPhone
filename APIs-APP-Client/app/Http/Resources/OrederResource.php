<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrederResource extends JsonResource
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
            "ID_Order"=>$this->ID_Order,
            "ID_Partner"=>$this->ID_Partner,
            //"ID_Payment"=>$this->ID_Payment,
            "Account"=>$this->Account,
            "Total"=>$this->Total,
            "Discount"=>$this->Discount,
            "Money"=>$this->Money,
            "Order_Status"=>$this->Order_Status== 1?"Kích hoạt":"Bị huỷ",
            "Pay_Status"=>$this->Pay_Status== 1?"Đã trả tiền":"Chưa trả tiền",
        ];
    }
    
}
