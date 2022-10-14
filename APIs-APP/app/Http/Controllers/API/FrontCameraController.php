<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontCameraRequest;
use App\Http\Resources\FrontCameraResource;
use App\Models\FrontCamera;
use Illuminate\Http\Request;

class FrontCameraController extends Controller
{
    protected $FCamera;
    public function __construct(FrontCamera $ca)
    {
        $this->FCamera = $ca;
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
        $Fcamera = $this->FCamera->get()->where('ID_Product','=',$id);
        $FcameraRS = FrontCameraResource::collection($Fcamera)->response()->getData(true);

        return response()->json(['Stauts'=>201,'Data'=>$FcameraRS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FrontCameraRequest $request, $id)
    {
        //
        $input = $request->all();
        
        $FcameraID = $this->Display->get()->where('ID_Product','=',$id);
        if(count($FcameraID)!=0)
            $editFcamera = $this->FCamera->editFcamera($input,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json(['Status'=>201,'Data'=>$editFcamera]);
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
