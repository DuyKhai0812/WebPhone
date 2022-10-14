<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Partner extends Model
{
    use HasFactory;
    protected $table = "partner";
    protected $primaryKey = "ID_Partner";
    protected $filltable = [
        "ID_Partner",
        "Name_Partner",
    ];
    public function addPar($request)
    {
        $Name_Partner = $request['Name_Partner'];
        try{
            $sql = DB::insert("INSERT INTO `partner`(`ID_Partner`, `Name_Partner`) VALUES (null,?)",[$Name_Partner]);
        }catch(Exception $e){
            return response()->json(['Scucess'=>false,"Bug"=>$e]);
        }
        return response()->json(['Scucess'=>true]);
    }
    public function editPar($request,$id)
    {
        $ID = $id;
        $Name_Partner = $request['Name_Partner'];
        try{
            $sql = DB::update("UPDATE `partner` SET `Name_Partner`=? WHERE `ID_Partner`=?",[$Name_Partner,$ID]);
        }catch(Exception $e)
        {
            return response()->json(['Scucess'=>false,"Bug"=>$e]);
        }
        return response()->json(['Scucess'=>true]);
    }
}
