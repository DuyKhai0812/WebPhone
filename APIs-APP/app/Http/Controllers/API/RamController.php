<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RamRequest;
use App\Http\Resources\RamResource;
use App\Models\Ram;
use Illuminate\Http\Request;

class RamController extends Controller
{
    protected $ram;
    public function __construct(Ram $rm)
    {
        $this->ram = $rm;
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
        $raam = $this->ram->get()->where('ID_Product','=',$id);
        $ramRS = RamResource::collection($raam)->response()->getData(true);

        return response()->json([
            'Data'=>$ramRS,
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
    public function update(RamRequest $request, $id)
    {
        //
        $input = $request->all();
        $RamID = $this->ram->get()->where('ID_Product','=',$id);
        if(count($RamID)!=0)
            $editRam = $this->ram->editRam($input,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json(['data'=>$input,'status'=>$editRam,'Status'=>201]);
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
