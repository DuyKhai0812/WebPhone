<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Image extends Model
{
    use HasFactory;
    protected $table = "images";
    protected $primaryKey = "ID_Image";
    protected $filltable = [
        "ID_Image",
        "ID_Product",
        "Name_Image"
    ];
    public function addImage($request)
    {
        $ID_Product = $request['ID_Product'];
        $Name_Image = $request['Name_Image'];
        $sql = DB::select("INSERT INTO `images`(`ID_Image`, `ID_Product`, `Name_Image`) VALUES (null,'$ID_Product','$Name_Image')");

        if($sql)
            return false;
        else 
            return true;
    }

    public function editImage($request,$id)
    {
        $ID_Image = $id;
        $Name_Image = $request['Name_Image'];
        $sql = DB::select("UPDATE `images` SET `Name_Image`='$Name_Image' WHERE `ID_Image`='$ID_Image'");

        if($sql)
            return false;
        else 
            return true;
    }
}
