<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OSRequest;
use App\Http\Resources\OSResource;
use App\Models\OS;
use Illuminate\Http\Request;

class OSController extends Controller
{
    protected $OS;
    public function __construct(OS $os_cpu)
    {
        $this->OS = $os_cpu;
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
        $OOS = $this->OS->get()->where('ID_Product','=',$id);
        $OSRS = OSResource::collection($OOS)->response()->getData(true);
        return response()->json(['Stauts'=>201,'Data'=>$OSRS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OSRequest $request, $id)
    {
        //
        $input = $request->all();
        $OSID = $this->OS->get()->where('ID_Product','=',$id);
        if(count($OSID)!=0)
            $editOS = $this->OS->editOS($input,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json(['data'=>$input,'status'=>$editOS,'Status'=>201]);
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
