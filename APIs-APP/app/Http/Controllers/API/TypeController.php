<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $type;
    public function __construct(Type $tyype)
    {
        $this->type = $tyype;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $typppe = $this->type->get();
        $typeRS = TypeResource::collection($typppe)->response()->getData(true);

        return response()->json([
            'Data'=>$typeRS,
            'Status'=>201
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        //
        $getData = $request->all();
        $postData = $this->type->addType($getData);

        return response()->json([
            'Data'=>$postData,
            'Status'=>201
        ]);
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
        $typppe = $this->type->get()->where('ID_Type_Products','=',$id);
        $typeRS = TypeResource::collection($typppe)->response()->getData(true);

        return response()->json([
            'Data'=>$typeRS,
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
        //
        $getData = $request->all();
        $typeID = $this->type->get()->where('ID_Product','=',$id);
        if(count($typeID)!=0)
            $editData = $this->type->editType($getData,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);

        return response()->json([
            'Data'=>$editData,
            'Status'=>201
        ]);
        
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
