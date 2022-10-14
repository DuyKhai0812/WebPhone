<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "ID_Order";
    protected $filltable = [
        "ID_Order",
        "ID_Partner",
        "ID_Payment",
        "Account",
        "Total",
        "Discount",
        "Money",
        "Order_Status",
        "Pay_Status",
    ];
    public function insert($request)
    {
        $ID_Partner = $request['ID_Partner'];
        $Account = $request['Account'];
        $Total = 0;
        $Discount = $request['Discount'];
        $Money = 0;
        $Order_Status = $request['Order_Status'];
        $Pay_Status = $request['Pay_Status'];
        // dd("INSERT INTO `orders`(`ID_Order`, `ID_Partner`, `Account`, `Total`, `Discount`, `Money`, `Order_Status`, `Pay_Status`, `ID_Payment`) 
        // VALUES (null,$ID_Partner,$Account,$Total,$Discount,$Money,$Order_Status,$Pay_Status,null);");
        try{
            DB::insert("INSERT INTO `orders`(`ID_Order`, `ID_Partner`, `Account`, `Total`, `Discount`, `Money`, `Order_Status`, `Pay_Status`, `ID_Payment`) 
            VALUES (null,$ID_Partner,'$Account',$Total,$Discount,$Money,$Order_Status,0,null);");
        }catch(Exception $e){
            return response()->json(['Scucess'=>false,"Bug"=>$e]);
        }
        return response()->json(['Scucess'=>true]);
        
    }
    public function edit($request,$id)
    {
        $ID_Partner = $request['ID_Partner'];
        $Order_Status = $request['Order_Status']; 
        $Pay_Status = $request['Pay_Status'];
        $Discount = $request['Discount'];
        DB::beginTransaction();
        try{
            DB::update("UPDATE `orders` SET `ID_Partner`= ?,`Discount`=?,`Order_Status`=$Order_Status,`Pay_Status`=? WHERE `ID_Order`=?",[$ID_Partner,$Discount,$Pay_Status,$id]);
            DB::update("CALL `update-total-money`(?);",[$id]);
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['Scucess'=>false,'Bug'=>$e]);
        }
        return response()->json(['Scucess'=>true]);
    }
    public function upOrder($id)
    {
        $order = DB::select("SELECT `Order_Status` FROM `orders` WHERE`ID_Order`= $id");
        $num = $order[0]->Order_Status;
        if($num < 5)
        {
            try{
                DB::update("UPDATE `orders` SET `Order_Status`=? WHERE `ID_Order`=?;", [$num + 1,$id]);
            }catch(Exception $e){
                return response()->json(['Scucess'=>false,'Bug'=>$e]);
            }
        }
        else
        {
            return response()->json(['Scucess'=>false,'Bug'=>'Đã giao hàng thành công']);
        }
        return response()->json(['Scucess'=>true]);
    }
}
