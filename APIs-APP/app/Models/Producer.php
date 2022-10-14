<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producer extends Model
{
    use HasFactory;
    protected $table = "producers";
    protected $primaryKey = "ID_Producer";
    protected $fillable = [
        "ID_Producer",
        "Name_Producer",
        "Email_Producer",
        "Phone_Producer",
        "Address_Producer",
    ];
    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function addData($request)
    {
        $Name_Producer = $request['Name_Producer'];
        $Email_Producer = $request['Email_Producer'];
        $Phone_Producer = $request['Phone_Producer'];
        $Address_Producer = $request['Address_Producer'];

        $insertData = DB::select("INSERT INTO `producers`(`ID_Producer`, `Name_Producer`, `Email_Producer`, `Phone_Producer`, `Address_Producer`) 
                                    VALUES (NULL,'$Name_Producer','$Email_Producer','$Phone_Producer','$Address_Producer')");
        if($insertData)
            return false;
        else
            return true;
    }
    public function editData($request,$id)
    {
        $Name_Producer = $request['Name_Producer'];
        $Email_Producer = $request['Email_Producer'];
        $Phone_Producer = $request['Phone_Producer'];
        $Address_Producer = $request['Address_Producer'];
        $editData = DB::select("UPDATE `producers` 
                                SET `Name_Producer`='$Name_Producer',`Email_Producer`='$Email_Producer',`Phone_Producer`='$Phone_Producer',`Address_Producer`='$Address_Producer' 
                                WHERE `ID_Producer`='$id'");
        if($editData)
            return false;
        else
            return true;
    }
}
