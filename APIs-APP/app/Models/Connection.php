<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Connection extends Model
{
    use HasFactory;
    protected $table = "connection";
    protected $primaryKey = "ID_Product";
    protected $fillable = [
        "ID_Product",
        "Mobile_Network",
        "SIM",
        "WIFI",
        "GPS",
        "Bluetooth",
        "Connector_Charger",
        "Jack_Headphone",
    ];

    public function editCon($request,$id)
    {
        $ID_Product = $id;
        $Mobile_Network = $request['Mobile_Network'];
        $SIM = $request['SIM'];
        $WIFI = $request['WIFI'];
        $GPS = $request['GPS'];
        $Bluetooth = $request['Bluetooth'];
        $Connector_Charger = $request['Connector_Charger'];
        $Jack_Headphone = $request['Jack_Headphone'];
        $sql = DB::select("UPDATE `connection` 
                            SET `Mobile_Network`='$Mobile_Network',`SIM`='$SIM',`WIFI`='$WIFI',`GPS`='$GPS',`Bluetooth`='$Bluetooth',`Connector_Charger`='$Connector_Charger',`Jack_Headphone`='$Jack_Headphone'
                            WHERE `ID_Product`='$ID_Product'");
        if($sql)
            return false;
        else
            return true;
    }
}
