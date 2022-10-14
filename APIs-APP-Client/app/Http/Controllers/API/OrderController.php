<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\EditOrderRequest;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Resources\OrederResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;
    public function __construct(Order $or)
    {
        $this->order = $or;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $getOrder = $this->order->get();
        $OrderRS = OrederResource::collection($getOrder)->response()->getData(true);

        return response()->json(['data'=>$OrderRS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        //
        $input = $request->all();
        $insert = $this->order->insert($input);

        return response()->json(['Status'=>$insert]);
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
        $getOrder = $this->order->get()->where("ID_Order","=",$id);
        $OrderRS = OrederResource::collection($getOrder)->response()->getData(true);

        return response()->json(['data'=>$OrderRS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditOrderRequest $request, $id)
    {
        //
        $input = $request->all();
        $edits = $this->order->edit($input,$id);

        return response()->json(['Status'=>$edits]);
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
    public function StatusOrder(Request $re)
    {
        $re= ['ID'=> $re->ID,];
        $edits = $this->order->upOrder($re['ID']);

        return $edits;
    }
}
