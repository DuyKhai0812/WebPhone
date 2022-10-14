<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Resources\ProductsResource;

class ProductsController extends Controller
{
    protected $pro;
    public function __construct(Products $products)
    {
        $this->pro = $products;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->pro->paginate(1);
        $productsRS = ProductsResource::collection($products)->response()->getData(true);
        return response()->json([
            'Data'=>$productsRS,
            'Status'=>201
        ],201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $getDataProducts = $request->all();
        $postData = $this->pro->addData($getDataProducts);
        return response()->json(['data'=>$getDataProducts,'status'=>$postData]);
        // return response()->json(['data'=>$getDataProducts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = $this->pro->get()->where('ID_Product','=',$id);
        $productsRS = ProductsResource::collection($products)->response()->getData(true);
        return response()->json([
            'Data'=>$productsRS,
            'Status'=>201
        ],201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
        $getDataProducts = $request->all();
        $productID = $this->pro->get()->where('ID_Product','=',$id);
        if(count($productID)!=0)
            $editsData = $this->pro->editData($getDataProducts,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);

        return response()->json([
            'Data'=>$editsData,
            'ID'=>$id,
            'Status'=>201
        ],201);
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

    /**
     * Chỉnh sửa tình trạng của sản phẩm
     *
     */
    public function Status(Request $request)
    {
        $request = [
            'ID_Product'=> $request->ID_Product,
            'Status'=> $request->Status,
        ];
        $editST = $this->pro->editStatus($request['ID_Product'],$request['Status']);
        return response()->json([
            'Data'=>$editST,
            'Status'=>201
        ]);
    }
    /**
     *Chỉnh sửa kích hoạt sản phẩm 
     */
    public function Active(Request $request)
    {
        $request = [
            'ID_Product'=> $request->ID_Product,
            'Active'=> $request->Active,
        ];
        $editAT = $this->pro->editActive($request['ID_Product'],$request['Active']);
        return response()->json([
            'Data'=>$editAT,
            'Status'=>201
        ]);
    }
    /**
     * addID để add id vào các chi tiết thộng tin của sản phẩm
     * getTable để lấy tên các table để thêm vào ID_Product
     */
    public function addID(Request $request)
    {
        $request = [
            'ID_Product'=> $request->ID_Product,
            'Name'=> $request->Name,
        ];
        $addID = $this->pro->addFullID($request['Name'],$request['ID_Product']);

        return response()->json(['data'=>$addID,'status'=>201]);
    }
    public function getTable()
    {
        $getTable = $this->pro->getNameTable();
        return response()->json(['data'=>$getTable]);
    }
}
