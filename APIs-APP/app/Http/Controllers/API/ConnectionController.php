<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConnectionRequest;
use App\Http\Resources\ConnectionResource;
use App\Models\Connection;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    protected $connection;
    public function __construct(Connection $con)
    {
        $this->connection = $con;
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
        $getCon = $this->connection->get()->where('ID_Product','=',$id);
        $getRS = ConnectionResource::collection($getCon)->response()->getData(true);
        return response()->json(['data'=>$getRS,'status'=>201]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConnectionRequest $request, $id)
    {
        //
        $input = $request->all();
        
        $connectionID = $this->connection->get()->where('ID_Product','=',$id);
        if(count($connectionID)!=0)
            $editCon = $this->connection->editCon($request,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json(['data'=>$editCon,'input'=>$input,'status'=>201]);
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
