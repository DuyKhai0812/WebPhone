<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ram extends Model
{
    use HasFactory;
    protected $table = "ram-memory";
    protected $primaryKey = "ID_Product";
    protected $fillable = [
        "ID_Product ",
        "Ram",
        "Memory",
        "Memory_Use",
        "Memory_Stick",
        "Phone_Book"
    ];
    public function editRam($request,$id)
    {
        $ID_Product = $id;
        $Ram = $request['Ram'];
        $Memory = $request['Memory'];
        $Memory_Use = $request['Memory_Use'];
        $Memory_Stick = $request['Memory_Stick'];
        $Phone_Book = $request['Phone_Book'];

        $sql = DB::select("UPDATE `ram-memory` 
                            SET `Ram`='$Ram',`Memory`='$Memory',`Memory_Use`='$Memory_Use',`Memory_Stick`='$Memory_Stick',`Phone_Book`='$Phone_Book' 
                            WHERE `ID_Product`='$ID_Product'");
        if($sql)
            return false;
        else
            return true;
    }
}
