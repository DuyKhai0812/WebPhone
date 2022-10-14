<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;
    protected $table = "tags";
    protected $primaryKey = "ID_Tag";
    protected $fillable = [
        "ID_Tag",
        "ID_Product",
        "Name_Tag",
    ];
    public function addTag($request)
    {
        //$ID_Tag = $request['ID_Tag'];
        $ID_Product = $request['ID_Product'];
        $Name_Tag = $request['Name_Tag'];

        $sql = DB::select("INSERT INTO `tags`(`ID_Tag`, `ID_Product`, `Name_Tag`) VALUES (null,$ID_Product,'$Name_Tag')");
        if($sql)
            return false;
        else
            return true;
    }
    public function editTag($request,$id)
    {
        $ID_Tag = $id;
        //$ID_Product = $request['ID_Product'];
        $Name_Tag = $request['Name_Tag'];

        $sql = DB::select("UPDATE `tags` SET `Name_Tag`='$Name_Tag' WHERE `ID_Tag`='$ID_Tag'");
        if($sql)
            return false;
        else
            return true;
    }
}
