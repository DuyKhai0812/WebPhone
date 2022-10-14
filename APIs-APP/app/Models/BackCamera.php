<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BackCamera extends Model
{
    use HasFactory;
    protected $table = "back-camera";
    protected $primaryKey = "ID_Product";
    protected $fillable = [
        "ID_Product",
        "Deck_Back_Camera",
        "Flash",
        "Function_Back_Camera",
    ];

    public function editBackCamera($request,$id)
    {
        $ID_Producer = $id;
        $Deck_Back_Camera = $request['Deck_Back_Camera'];
        $Flash = $request['Flash'];
        $Function_Back_Camera = $request['Function_Back_Camera'];
        $sql = DB::select("UPDATE `back-camera` 
                            SET `Deck_Back_Camera`='$Deck_Back_Camera',`Flash`='$Flash',`Function_Back_Camera`='$Function_Back_Camera' 
                            WHERE `ID_Product`='$ID_Producer'");
        if($sql)
            return false;
        else
            return true;
    }
    
}
