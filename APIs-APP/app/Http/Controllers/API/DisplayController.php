<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DisplayRequest;
use App\Http\Resources\DisplayResource;
use App\Models\Display;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    protected $Display;
    public function __construct(Display $dis)
    {
        $this->Display = $dis;
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
        $display = $this->Display->get()->where('ID_Product','=',$id);
        $displayRS = DisplayResource::collection($display)->response()->getData();

        return response()->json(['Status'=>201,'Data'=>$displayRS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisplayRequest $request, $id)
    {
        //
        $input = $request->all();
        $displayID = $this->Display->get()->where('ID_Product','=',$id);
        if(count($displayID)!=0)
            $editData = $this->Display->editDisplay($input,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);

        return response()->json(['Status'=>$editData,'Data'=>201]);
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
