<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatteryRequest;
use App\Http\Resources\BatteryResource;
use App\Models\Battery;
use Illuminate\Http\Request;

class BatteryControlller extends Controller
{
    protected $battery;
    public function __construct(Battery $by)
    {
        $this->battery = $by;
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
        $getBattery = $this->battery->get()->where('ID_Product','=',$id);
        $batteryRS = BatteryResource::collection($getBattery)->response()->getData(true);
        return response()->json(['data'=>$batteryRS,'Status'=>201]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BatteryRequest $request, $id)
    {
        //
        $input = $request->all();
        
        $batteryID = $this->battery->get()->where('ID_Product','=',$id);
        if(count($batteryID)!=0)
            $editBattery = $this->battery->editBattery($input,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json(['data'=>$editBattery,'input'=>$input,'status'=>201]);
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
