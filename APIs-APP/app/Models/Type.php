<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Type extends Model
{
    use HasFactory;
    protected $table = "type-products";
    protected $primaryKey = "ID_Type_Products";
    protected $filltable = [
        "ID_Type_Products",
        "Name_Type"
    ];
    //-------------------------------------------------
    public function addType($request)
    {
        //$ID_Type_Products = $request['ID_Type_Products'];
        $Name_Type = $request['Name_Type'];
        $addData = DB::select("INSERT INTO `type-products`(`ID_Type_Products`, `Name_Type`) VALUES (null,'$Name_Type')");
        if($addData)
            return false;
        else
            return true;

            
    }
    //----------------------------------------------------
    public function editType($request,$id)
    {
        $Name_Type = $request['Name_Type'];
        $editData = DB::select("UPDATE `type-products` SET `Name_Type`='$Name_Type' WHERE `ID_Type_Products`='$id'");
        if($editData)
            return false;
        else
            return true;
    }
}
