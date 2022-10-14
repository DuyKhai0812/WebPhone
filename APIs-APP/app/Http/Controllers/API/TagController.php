<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tag;
    public function __construct(Tag $taag)
    {
        $this->tag = $taag;
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
    public function store(TagRequest $request)
    {
        //
        $input = $request->all();
        $insertTag = $this->tag->addTag($input);

        return response()->json([
                'data'=>$insertTag,
                'input'=>$input,
                'status'=>201
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
        $getTag = $this->tag->get()->where('ID_Product','=',$id);
        $TagRS = TagResource::collection($getTag)->response()->getData(true);

        return response()->json([
            'Data'=>$TagRS,
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
        $input = $request->all();
        $Tagg = $this->tag->get()->where('ID_Product','=',$id);
        if(count($Tagg)!=0)
            $editTag = $this->tag->editTag($input,$id);
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        
        return response()->json([
                'data'=>$editTag,
                'input'=>$input,
                'status'=>201
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
        $Tagg = $this->tag->findOrFail($id);
        if($Tagg)
            $Tagg->delete();
        else
            return response()->json(['Status'=>200,'Message'=>'Mã không tồn tại']);
        return response()->json([
                'status'=>201,
                'Message'=>'Thành công'
        ]);
    }
}
