<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProducerRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProducerResource;
use App\Models\Producer;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    protected $pro;
    public function __construct(Producer $producer)
    {
        $this->pro = $producer ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producer = $this->pro->get();
        $producerRS = ProducerResource::collection($producer)->response()->getData(true);
        return response()->json([
            'Data'=>$producerRS,
            'Status'=>201
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProducerRequest $request)
    {
        //
        $requestProducer = $request->all();
        $producerAdd = $this->pro->addData($requestProducer);
        return response()->json(['data'=>$requestProducer,'status'=>$producerAdd,'Status'=>201]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producer = $this->pro->get()->where('ID_Producer','=',$id);
        $producerRS = ProducerResource::collection($producer)->response()->getData(true);
        return response()->json([
            'Data'=>$producerRS,
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
    public function update(Request $request, $id)
    {
        $requestProducer = $request->all();

        $producerID = $this->pro->get()->where('ID_Product','=',$id);
        if(count($producerID)!=0)
            $producerEdit = $this->pro->editData($requestProducer,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json(['data'=>$requestProducer,'status'=>$producerEdit,'Status'=>201]);
        
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
