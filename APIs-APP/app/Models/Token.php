<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Token extends Model
{
    use HasFactory;

    protected $table = "token";
    protected $primaryKey = "id";
    protected $fillable = [
        "id ",
        "Account",
        "Token",
        "Refresh_Token",
        "Token_Expried",
        "Refresh_Token_Expried"
    ];
    public function checkToken($id)
    {
        $checkDB = DB::select("SELECT Account FROM `token` WHERE Account='$id'");
        if($checkDB)
            return true;
        else
            return false;
    }
    public function showTK($acc)
    {
        $checkDB = DB::select("SELECT * FROM `token` WHERE Account='$acc'");
        return $checkDB;
    }
    public function getToken($acc)
    {
        $getToken = DB::select("SELECT `Token` FROM `token` WHERE `Account` = '$acc'");
        return $getToken;
    }
}
