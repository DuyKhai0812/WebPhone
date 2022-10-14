<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoPhoneRequest;
use App\Http\Resources\InfoPhoneResource;
use App\Models\InfoPhone;
use Illuminate\Http\Request;

class InfoPhoneController extends Controller
{
    protected $Info;
    public function __construct(InfoPhone $if)
    {
        $this->Info = $if;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return request()->json(['Message'=>'Nhập mã sản phẩm','Status'=>201]);
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
        $Inf = $this->Info->get()->where('ID_Product','=',$id);
        $infRS = InfoPhoneResource::collection($Inf)->response()->getData(true);

        return response()->json(['Stauts'=>201,'Data'=>$infRS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InfoPhoneRequest $request, $id)
    {
        //
        $input = $request->all();
        
        $InfoID = $this->Info->get()->where('ID_Product','=',$id);
        if(count($InfoID)!=0)
            $editInfo = $this->Info->editInfo($input,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json(['data'=>$input,'status'=>$editInfo,'Status'=>201]);
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
