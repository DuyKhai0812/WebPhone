<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailsProRequest;
use App\Http\Requests\EditDetailsProductsRequest;
use App\Http\Resources\DetailsProResource;
use App\Models\DetailsProduct;
use Illuminate\Http\Request;

class DetailsProController extends Controller
{
    protected $detail;
    public function __construct(DetailsProduct $detailPR)
    {
        $this->detail = $detailPR;       
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
    public function store(DetailsProRequest $request)
    {
        //
        $getData = $request->all();
        $check = $this->detail->checkID($getData['ID_Product']);
        if($check == true)
            return response()->json([
                'data'=>false,
                'input'=>$getData,
                'message'=>'Chi tiết đã tồn tại'
            ]);
        else
        {
            $add = $this->detail->addData($getData['ID_Product']);
            return response()->json([
                'data'=>$add,
                'input'=>$getData,
                'message'=>'Thành công'
            ]);
        }
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
        $producDetail = $this->detail->get()->where('ID_Product','=',$id);
        $productsDTRS = DetailsProResource::collection($producDetail)->response()->getData(true);
        return response()->json([
            'Data'=>$productsDTRS,
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
    public function update(EditDetailsProductsRequest $request, $id)
    {
        //
        $getData = $request->all();

        $detailID = $this->detail->get()->where('ID_Product','=',$id);
        if(count($detailID)!=0)
            $producDetail = $this->detail->editData($getData,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json(['data'=>$producDetail,'input'=>$getData,'status'=>201]);
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
