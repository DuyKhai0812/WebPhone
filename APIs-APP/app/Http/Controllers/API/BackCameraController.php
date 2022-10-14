<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackCameraRequest;
use App\Http\Resources\BackCameraResource;
use App\Models\BackCamera;
use Illuminate\Http\Request;

class BackCameraController extends Controller
{
    protected $backCamera;
    public function __construct(BackCamera $BC)
    {
        $this->backCamera = $BC;
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
        $bCamera = $this->backCamera->get()->where('ID_Product','=',$id);
        $bCameraRS = BackCameraResource::collection($bCamera)->response()->getData(true);
        return response()->json(['data'=>$bCameraRS,'status'=>201]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BackCameraRequest $request, $id)
    {
        //
        $requestBC = $request->all();
        
        $backCID = $this->backCamera->get()->where('ID_Product','=',$id);
        if(count($backCID)!=0)
            $editBC = $this->backCamera->editBackCamera($requestBC,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json(['data'=>$editBC,'input'=>$requestBC,'status'=>201]);
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
