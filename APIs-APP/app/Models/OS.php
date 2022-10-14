<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OS extends Model
{
    use HasFactory;
    protected $table = "os-cpu";
    protected $primaryKey = "ID_Product";
    protected $filltable = [
        "ID_Product",
        "OS",
        "CPU",
        "Speed_CPU",
        "Speed_GPU"
    ];
    public function editOS($request,$id)
    {
        $ID_Product = $id;
        $OS = $request['OS'];
        $CPU = $request['CPU'];
        $Speed_CPU = $request['Speed_CPU'];
        $Speed_GPU = $request['Speed_GPU'];

        $sql = DB::select("UPDATE `os-cpu` SET `OS`='$OS',`CPU`='$CPU',`Speed_CPU`='$Speed_CPU',`Speed_GPU`='$Speed_GPU' WHERE `ID_Product`='$ID_Product'");
        if($sql)
            return false;
        else
            return true;
    }
}
