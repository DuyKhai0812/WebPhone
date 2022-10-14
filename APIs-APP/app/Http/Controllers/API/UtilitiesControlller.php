<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UtilitiesRequest;
use App\Http\Resources\UtilitiesResource;
use App\Models\Utilities;
use Illuminate\Http\Request;

class UtilitiesControlller extends Controller
{
    protected $ul;
    public function __construct(Utilities $Uti)
    {
        $this->ul = $Uti;
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
        $getUtil = $this->ul->get()->where('ID_Product','=',$id);
        $UtilRS = UtilitiesResource::collection($getUtil)->response()->getData(true);

        return response()->json([
            'Data'=>$UtilRS,
            'Status'=>201
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UtilitiesRequest $request, $id)
    {
        //
        $input = $request->all();
        $UtilID = $this->ul->get()->where('ID_Product','=',$id);
        if(count($UtilID)!=0)
            $eidtUtil = $this->ul->editUL($input,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json(['data'=>$input,'status'=>$eidtUtil,'Status'=>201]);
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
