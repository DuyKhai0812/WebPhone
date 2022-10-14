<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Utilities extends Model
{
    use HasFactory;
    protected $table = "utilities";
    protected $primaryKey = "ID_Product ";
    protected $filltable = [
        "ID_Product",
        "Security",
        "Special_Function",
        "Water",
        "Record",
        "Radio",
        "Movie",
        "Music",
    ];
    public function editUL($request,$id)
    {
        $ID_Product = $id;
        $Security = $request['Security'];
        $Special_Function = $request['Special_Function'];
        $Water = $request['Water'];
        $Record = $request['Record'];
        $Radio = $request['Radio'];
        $Movie = $request['Movie'];
        $Music = $request['Music'];

        $sql = DB::select("UPDATE `utilities` 
                            SET `Security`='$Security',`Special_Function`='$Special_Function',`Water`='$Water',`Record`='$Record',`Radio`='$Radio',`Movie`='$Movie',`Music`='$Music' 
                            WHERE `ID_Product`='$ID_Product'");
        if($sql)
            return false;
        else
            return true;
    }
}
