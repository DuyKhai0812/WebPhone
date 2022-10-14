<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Display extends Model
{
    use HasFactory;
    protected $table = "display";
    protected $primaryKey = "ID_Product";
    protected $filltable = [
        "ID_Product",
        "Resolution",
        "Display_Details",
        "Maximum_Light",
        "Type_Screen"
    ];
    public function editDisplay($request,$id)
    {
        $ID_Product = $id;
        $Resolution = $request['Resolution'];
        $Widescreen = $request['Widescreen'];
        $Maximum_Light = $request['Maximum_Light'];
        $Type_Screen = $request['Type_Screen'];
        $Screen_Technology = $request['Screen_Technology'];

        $sql = DB::select("UPDATE `display` 
                            SET `Resolution`='$Resolution',`Widescreen`='$Widescreen',`Maximum_Light`='$Maximum_Light',`Type_Screen`='$Type_Screen',`Screen_Technology`='$Screen_Technology' 
                            WHERE `ID_Product`='$ID_Product'");
        if($sql)
            return false;
        else
            return true;
    }
}
