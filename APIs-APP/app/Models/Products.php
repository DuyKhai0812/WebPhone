<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "ID_Product";
    protected $fillable = [
        "ID_Product ",
        "ID_Type_Products",
        "ID_Producer",
        "Price",
        "Create_Date",
        "Status",
        "Active"
    ];
    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function addData($request)
    {
        $ID_Type_Products = $request['ID_Type_Products'];
        $ID_Producer = $request['ID_Producer'];
        $Name_Product = $request['Name_Product'];
        $Price = $request['Price'];
        $Create_Date = $request['Create_Date'];
        $Status = $request['Status'];
        $Active = $request['Active'];

        $insertData = DB::select("INSERT INTO `products`(`ID_Product`, `ID_Type_Products`, `ID_Producer`, `Name_Product`, `Price`, `Create_Date`, `Status`, `Active`) 
                                    VALUES (NULL,'$ID_Type_Products','$ID_Producer','$Name_Product','$Price','$Create_Date','$Status','$Active')");
        if($insertData)
            return false;
        else
            return true;
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    public function editData($request,$id)
    {
        $ID_Type_Products = $request['ID_Type_Products'];
        $ID_Producer = $request['ID_Producer'];
        $Name_Product = $request['Name_Product'];
        $Price = $request['Price'];
        $Create_Date = $request['Create_Date'];
        $Status = $request['Status'];
        $Active = $request['Active'];

        $eidtData = DB::select("UPDATE `products` 
                                SET `ID_Type_Products`='$ID_Type_Products',`ID_Producer`='$ID_Producer',`Name_Product`='$Name_Product',`Price`='$Price',`Create_Date`='$Create_Date',`Status`='$Status',`Active`='$Active' 
                                WHERE `ID_Product`= '$id'");

        if($eidtData)
            return false;
        else
            return true;
    }
    //////////////////////////////////////////////////////////////////////////////
    public function editStatus($ID_Product,$Status)
    {
        $RS = true;
        if(!isset($Status) || !isset($ID_Product))
        {
            return $RS;
        }
        if($Status == 1)
        {
            $editStatus = DB::select("UPDATE `products` SET `Status`='0' WHERE `ID_Product`='$ID_Product'");
            if($editStatus)
            {
                $RS = false;
            }
            return $RS;
                 
        }
        else if($Status == 0)
        {
            $editStatus = DB::select("UPDATE `products` SET `Status`='1' WHERE `ID_Product`='$ID_Product'");
            if($editStatus)
            {
                $RS = false;
            }
            return $RS;
        }
        
    }
    ////////////////////////////////////////////////////////////////////////
    public function editActive($ID_Product,$Active)
    {
        $RS = true;
        if(!isset($Active) || !isset($ID_Product))
        {
            return $RS;
        }
        if($Active == 1)
        {
            $editActive = DB::select("UPDATE `products` SET `Active`='0' WHERE `ID_Product`='$ID_Product'");
            if($editActive)
            {
                $RS = false;
            }
            return $RS;
                 
        }
        else if($Active == 0)
        {
            $editActive = DB::select("UPDATE `products` SET `Active`='1' WHERE `ID_Product`='$ID_Product'");
            if($editActive)
            {
                $RS = false;
            }
            return $RS;
        }
        
    }
    ////////////////////////////////////////////////////////////////////////////////
    public function getNameTable()
    {
        $sql = DB::select("SELECT TABLE_NAME 
        FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='db_phonestore' AND TABLE_NAME!='admin' AND TABLE_NAME!='producers' AND TABLE_NAME!='product-details' AND TABLE_NAME!='products' AND TABLE_NAME!='token'");

        return $sql;
    }
    public function addFullID($name,$id)
    {
        $sql = DB::select("INSERT INTO `$name`(`ID_Product`) VALUES ($id)");

        if($sql)
            return false;
        else
            return true;
    }

}
