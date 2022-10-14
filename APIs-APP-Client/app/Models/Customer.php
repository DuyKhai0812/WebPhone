<?php

namespace App\Models;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    protected $table = "users-customer";
    protected $primaryKey = "Account";
    protected $filltable = [
        "Account",
        "Phone_Customer",
        "Password",
    ];
    public function createUser($request)
    {
        $Account = $request['Account'];
        $Phone_Customer = $request['Phone_Customer'];
        $Password = password_hash($request['Password'],PASSWORD_DEFAULT);
        DB::beginTransaction();
        try{
            DB::insert("INSERT INTO `users-customer`(`Account`, `Phone_Customer`, `Password`) VALUES (?,?,?)",[$Account,$Phone_Customer,$Password]);
            DB::insert("INSERT INTO `customers`(`Account`,`Phone_Customer`) VALUES (?,?)",[$Account,$Phone_Customer]);
            DB::commit();
            return response()->json(['Scucess'=>true]);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['Scucess'=>false,'Bug'=>$e]);
        }
            
    }
    public function LoginCustomer($request)
    {
        $Account = $request['Account'];
        $Password = $request['Password'];
        $Get_Password = DB::select("SELECT `Password` FROM `users-customer` WHERE `Account` = ?",[$Account]);
        $hash_PW= $Get_Password[0]->Password;
        //dd(print_r($Get_Password[0]->Password));
        if(password_verify($Password,$hash_PW))
            return true;
        else
            return false;
        
    }
    
}
