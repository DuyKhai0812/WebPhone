<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailOrder extends Model
{
    use HasFactory;
    protected $table = "detail-orders";
    protected $primaryKey = "ID_Detais_Order";
    protected $filltable = [
        "ID_Detais_Order",
        "ID_Order",
        "ID_Product",
        "Amount",
        "Total_Money",
    ];
    public function add($request)
    {
        $ID_Product = $request['ID_Product'];
        $ID_Order = $request['ID_Order'];
        $Amount = $request['Amount'];
        try{
            $sql = DB::insert("CALL `InsertDetail`(?, ?, ?);",[$ID_Product,$ID_Order,$Amount]);
        }catch(Exception $e){
            return response()->json(['Scucess'=>false,"Bug"=>$e]);
        }
        return response()->json(['Scucess'=>true]);
    }
    public function edit($request,$id)
    {
        $ID_Product = $request['ID_Product'];
        $ID_Order = $id;
        $Amount = $request['Amount'];
        DB::beginTransaction();
        try{
            DB::update("CALL `edit_detail`(?, ?, ?);",[$ID_Order,$Amount,$ID_Product]);
            DB::update("CALL `update-total-money`(?);",[$ID_Order]);
            DB::commit();
        }catch(Exception $e){
            DB::rollBack(2);
            return response()->json(['Scucess'=>false,"Bug"=>$e]);
        }
        return response()->json(['Scucess'=>true]);
    }
}
