<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Battery extends Model
{
    use HasFactory;
    protected $table = "battery";
    protected $primaryKey = "ID_Product";
    protected $fillable = [
        "ID_Product",
        "Battery_Capacity",
        "Type_Battery",
        "Support_Charger",
        "Charger_With_Phone",
        "Battery_Technology",
    ];

    public function editBattery($request,$id)
    {
        $ID_Product = $id;
        $Battery_Capacity = $request['Battery_Capacity'];
        $Type_Battery = $request['Type_Battery'];
        $Support_Charger = $request['Support_Charger'];
        $Charger_With_Phone = $request['Charger_With_Phone'];
        $Battery_Technology = $request['Battery_Technology'];
        $sql = DB::select("UPDATE `battery` 
                            SET `Battery_Capacity`='$Battery_Capacity',`Type_Battery`='$Type_Battery',`Support_Charger`='$Support_Charger',`Charger_With_Phone`='$Charger_With_Phone',`Battery_Technology`='$Battery_Technology' 
                            WHERE `ID_Product`='$ID_Product'");
        if($sql)
            return false;
        else
            return true;
    }
}
