<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailsProduct extends Model
{
    use HasFactory;
    protected $table = "product-details";
    protected $primaryKey = "ID_Product";
    protected $filltable = [
        "ID_Product",
        "Detail",
        "Display",
        "OS",
        "Font_Camera",
        "Back_Camera",
        "Ram",
        "Memory_Phone",
        "SIM",
        "Pin",
        "Charge",
        "Brand",
    ];
    public function checkID($id)
    {
        $sql = DB::select("SELECT `ID_Product` FROM `product-details` WHERE `ID_Product` = $id");
        if($sql)
            return true;
        else
            return false;
    }
    public function addData($id)
    {
        $sql = DB::select("INSERT INTO `product-details`(`ID_Product`, `Detail`, `Display`, `OS`, `Font_Camera`, `Back_Camera`, `Ram`, `Memory_Phone`, `SIM`, `Pin`, `Charge`, `Brand`) 
                            VALUES ('$id','','','','','','','','','','','')");
        if($sql)
            return false;
        else
            return true;
    }
    public function editData($request,$id)
    {

        $ID_Product = $id;
        $Detail = $request['Detail'];
        $Display = $request['Display'];
        $OS = $request['OS'];
        $Font_Camera = $request['Font_Camera'];
        $Back_Camera = $request['Back_Camera'];
        $Ram = $request['Ram'];
        $Memory_Phone = $request['Memory_Phone'];
        $SIM = $request['SIM'];
        $Pin = $request['Pin'];
        $Charge = $request['Charge'];
        $Brand = $request['Brand'];

        $sql = DB::select("UPDATE `product-details` 
                            SET `Detail`='$Detail',`Display`='$Display',`OS`='$OS',`Font_Camera`='$Font_Camera',`Back_Camera`='$Back_Camera',`Ram`='$Ram',`Memory_Phone`='$Memory_Phone',`SIM`='$SIM',
                            `Pin`='$Pin',`Charge`='$Charge',`Brand`='$Brand' 
                            WHERE `ID_Product`='$ID_Product'");
        if($sql)
            return false;
        else
            return true;
    }
}
