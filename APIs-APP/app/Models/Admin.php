<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admin";
    protected $primaryKey = "Account";
    protected $fillable = [
        "Account ",
        "Password",
        "Name"
    ];

    public function check($account,$password)
    {
        $CheckDB = DB::select("SELECT `Account` FROM `admin` WHERE Account =  '$account'AND Password = '$password'");
        if($CheckDB)
            return true;
        else
            return false;
    }
    public function getName($account)
    {
        $Name = DB::select("SELECT `Name` FROM `admin` WHERE Account =  '$account'");
        return $Name;
    }
}
