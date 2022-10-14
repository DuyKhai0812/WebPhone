<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerInfoRequest;
use App\Http\Resources\CustomerInfoResource;
use App\Models\CustomerInfo;
use Illuminate\Http\Request;

class CustomerInfoController extends Controller
{
    protected $info;
    public function __construct(CustomerInfo $if)
    {
        $this->info = $if;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $getAccount = $this->info->get()->where("Account","=",$id);
        $getAccountRS = CustomerInfoResource::collection($getAccount)->response()->getData(true);

        return $getAccountRS;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerInfoRequest $request, $id)
    {
        //
        $input = $request->all();
        $editIF = $this->info->editInFo($input,$id);
        
        return response()->json(['data'=>$editIF]);
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
}
