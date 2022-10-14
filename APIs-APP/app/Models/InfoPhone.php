<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InfoPhone extends Model
{
    use HasFactory;
    protected $table = "info-phone";
    protected $primaryKey = "ID_Product";
    protected $filltable = [
        "ID_Product",
        "Design",
        "Material",
        "Size_Weight",
        "Release_Time",
        "Brand"
    ];
    public function editInfo($request,$id)
    {
        $ID_Product = $id;
        $Design = $request['Design'];
        $Material = $request['Material'];
        $Size_Weight = $request['Size_Weight'];
        $Release_Time = $request['Release_Time'];
        $Brand = $request['Brand'];

        $sql = DB::select("UPDATE `info-phone` 
                            SET `Design`='$Design',`Material`='$Material',`Size_Weight`='$Size_Weight',`Release_Time`='$Release_Time',`Brand`='$Brand' 
                            WHERE `ID_Product`='$ID_Product'");

        if($sql)
            return false;
        else
            return true;
    }
}
