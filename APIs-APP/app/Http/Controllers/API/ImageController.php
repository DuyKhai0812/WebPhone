<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageEditRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $image;
    protected $product;
    public function __construct(Image $img,Products $pro)
    {
        $this->image = $img;
        $this->product = $pro;
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
    public function store(ImageRequest $request)
    {
        //
        
        $input = $request->all();
        $add = $this->image->addImage($input);

        return response()->json(['data'=>$input,'status'=>$add]);
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
        $getImage = $this->image->get()->where('ID_Product','=',$id);
        $ImageRS = ImageResource::collection($getImage)->response()->getData(true);

        return response()->json(['Stauts'=>201,'Data'=>$ImageRS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageEditRequest $request, $id)
    {
        //
        $getImage = $this->image->get()->where('ID_Product','=',$id);
        if(count($getImage)!=0)
        {
            $input = $request->all();
            $edit = $this->image->editImage($input,$id);

            return response()->json(['data'=>$input,'status'=>$edit]);
        }
        else
        {
            return response()->json(['data'=>'Mã ảnh sai','status'=>false]);
        }
        
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
        $img = $this->image->findOrFail($id);
        if($img)
            $img->delete();
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json([
                'status'=>201,
                'Message'=>'Thành công'
        ]);
    }
}
