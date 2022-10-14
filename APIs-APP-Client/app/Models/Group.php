<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
    use HasFactory;
    protected $table = "group-customer";
    protected $primaryKey = "ID_Group";
    protected $filltable = [
        "ID_Group",
        "Name_Group",
    ];
    public function addData($reqeuest)
    {
        $Name_Group = $reqeuest['Name_Group'];
        try{
            $sql = DB::insert("INSERT INTO `group-customer`(`ID_Group`, `Name_Group`) VALUES (null,?)",[$Name_Group]);
            return true;
        }catch(\Exception $e){
            return false;
        }
        
    }
    public function editData($reqeuest,$id)
    {
        $Name_Group = $reqeuest['Name_Group'];
        $ID_Group = $id;
        try{
            $sql = DB::update("UPDATE `group-customer` SET `Name_Group`= ? WHERE `ID_Group`= ?",[$Name_Group,$ID_Group]);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
}
