<?php

namespace App\Models;

use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerInfo extends Model
{
    use HasFactory;
    protected $table = "customers";
    //protected $primaryKey = "Account";
    protected $filltable = [
        "Account",
        "Name_Customer",
        "Create_Date",
        "ID_Group_Customer",
        "Birth_Day",
        "Phone_Customer",
        "Sex",
        "Email_Customer",
        "Active"
    ];
    public function editInFo($request,$id)
    {
        $Account = $id;
        $Create_Date = date('Y-m-d H:i:s');
        $Name_Customer = $request['Name_Customer'];
        $Birth_Day = $request['Birth_Day'];
        $Sex = $request['Sex'];
        $Email_Customer = $request['Email_Customer'];
        try{
            $sql = DB::update("UPDATE `customers` 
            SET `Name_Customer`=?,`Create_Date`=?,`ID_Group_Customer`= 1,`Birth_Day`=?,`Sex`=?,`Email_Customer`=?,`Active`=1 
            WHERE `Account`=?", [$Name_Customer,$Create_Date,$Birth_Day,$Sex,$Email_Customer,$Account]);
            return response()->json(['Scucess'=>true]);
        }catch(\Exception $e){
            return response()->json(['Scucess'=>false,"Bug"=>$e]);
        }
        
    }   
}
