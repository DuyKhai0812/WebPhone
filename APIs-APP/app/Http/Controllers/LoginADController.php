<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Token;
use Illuminate\Support\Str;

class LoginADController extends Controller
{
    private $ad;
    private $tk;
    public function __construct(Admin $adm,Token $tok)
    {
        $this->ad = $adm;
        $this->tk = $tok;
    }

    public function login(Request $request)
    {
        $checkLogin = [
            'Account' => $request->Account,
            'Password' => md5($request->Password),
        ];
        $login = $this->ad->check($checkLogin['Account'],$checkLogin['Password']);
        if($login == true){
            $name = $this->ad->getName($checkLogin['Account']);
            $tooken = $this->tk->getToken($checkLogin['Account']);
            if($this->tk->checkToken($checkLogin['Account']) == false)
            {
                $userSS = Token::insert([
                    'Token' => Str::random(40),
                    'Refresh_Token' => Str::random(40),
                    'Account' => $request->Account,
                    'Token_Expried' => date('Y-m-d H:i:s',strtotime('+30 day')),
                    'Refresh_Token_Expried' => date('Y-m-d H:i:s',strtotime('+360 day')),
                    'Created_Date'=> date('Y-m-d H:i:s'),
                    'Updated_Date'=> date('Y-m-d H:i:s')
                ]);
                return response()->json([
                    'Status'=>200,
                    'Name'=>$name,
                    'Message'=>"Thành công token",
                    'Token'=>$tooken
                ]);
            }
            else
            {

                return response()->json([
                    'Status'=>201,
                    'Data'=>['Name'=>$name[0]->Name,'Token'=>$tooken[0]->Token],
                    'Message'=>"Thành công",
                ]);
            }
        }else{
            return response()->json([
                'Status'=>202,
                'Name'=>"Nullll",
                'Message'=>"Sai mật khẩu hoặc tài khoản"
            ]);
        }
        
    }
}
