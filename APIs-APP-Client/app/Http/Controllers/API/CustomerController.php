<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use App\Http\Requests\Customer\LoginRequest;
//use App\Http\Requests\Customer\CustomerRequest;
use App\Models\Customer;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    protected $customer;
    protected $token;
    public function __construct(Customer $cus,Token $tk)
    {
        $this->customer = $cus;
        $this->token = $tk;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(['Status'=>true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        //
        $input = $request->all();
        $getPhone = $this->customer->get()->where("Phone_Customer","=",$input['Phone_Customer']);
        $getAccount = $this->customer->get()->where("Account","=",$input['Account']);
        if(count($getPhone) == 0 && count($getAccount) == 0)
        {
            $insertCT = $this->customer->createUser($input); 
        }
        else
        {
            return response()->json(['Status'=>"Tên hoặc số điện thoại đã tồn tại"]);
        }
        

        return response()->json(['Status'=>$insertCT]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function LoginCustomer(LoginRequest $request)
    {
        $input = $request->all();
        $getPass = $this->customer->LoginCustomer($input);
        $Acc = $input['Account'];
        if($getPass == true)
        {
            
            $tokenCheck = $this->token->get()->where('Account','=',$Acc);
            if(count($tokenCheck)==0)
            {
                $userSS = Token::insert([
                    'Token' => Str::random(40),
                    'Refresh_Token' => Str::random(40),
                    'Account' => $Acc,
                    'Token_Expried' => date('Y-m-d H:i:s',strtotime('+30 day')),
                    'Refresh_Token_Expried' => date('Y-m-d H:i:s',strtotime('+360 day')),
                    'Created_Date'=> date('Y-m-d H:i:s'),
                    'Updated_Date'=> date('Y-m-d H:i:s')
                ]);
                return response()->json([
                    'Status'=>200,
                    'Name'=>$Acc,
                    'Message'=>"Thành công thêm token"
                ]);
            }
            else
            {
                return response()->json([
                    'Status'=>200,
                    'Name'=>$Acc,
                    'Message'=>"Thành công đăng nhập",
                ]);
            }

        }
        else
        {
            return response()->json([
                'Status'=>200,
                'Name'=>$Acc,
                'Message'=>"Đăng nhập không thành công",
            ]);
        }
        
    }
}
