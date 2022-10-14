<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FrontCamera extends Model
{
    use HasFactory;
    protected $table = "font-camera";
    protected $primaryKey = "ID_Product";
    protected $filltable = [
        "ID_Product",
        "Deck_Font_Camera",
        "Function_Font_Camera",
    ];
    public function editFcamera($request,$id)
    {
        $ID_Product = $id;
        $Deck_Font_Camera = $request['Deck_Font_Camera'];
        $Function_Font_Camera = $request['Function_Font_Camera'];

        $sql = DB::select("UPDATE `font-camera` SET `Deck_Font_Camera`='$Deck_Font_Camera',`Function_Font_Camera`='$Function_Font_Camera' WHERE `ID_Product`='$ID_Product'");
        if($sql)
            return false;
        else
            return true;
    }
}
