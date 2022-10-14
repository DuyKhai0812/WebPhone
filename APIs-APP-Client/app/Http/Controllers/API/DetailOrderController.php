<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\DetailOrderRequest;
use App\Http\Requests\Order\EditDetailOrderRequest;
use App\Http\Resources\DetailOrderResource;
use App\Models\DetailOrder;
use Illuminate\Http\Request;

class DetailOrderController extends Controller
{
    protected $deOrder;
    public function __construct(DetailOrder $do)
    {
        $this->deOrder = $do;
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
    public function store(DetailOrderRequest $request)
    {
        //
        $input = $request->all();
        $insert = $this->deOrder->add($input);

        return response()->json(['data'=>$insert]);
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
        $detailOrder = $this->deOrder->get()->where("ID_Order","=",$id);
        $detailOrderRS = DetailOrderResource::collection($detailOrder)->response()->getData(true);

        return response()->json(['data'=>$detailOrderRS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditDetailOrderRequest $request, $id)
    {
        //
        $input = $request->all();
        $edit = $this->deOrder->edit($input,$id);

        return response()->json(['data'=>$edit]);
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
