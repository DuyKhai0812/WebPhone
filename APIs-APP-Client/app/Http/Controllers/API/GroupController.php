<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\GroupRequest;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $group;
    public function __construct(Group $gr)
    {
        $this->group = $gr;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $getGroup = $this->group->get();
        $GroupRs = GroupResource::collection($getGroup)->response()->getData(true);

        return response()->json(['data'=>$GroupRs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        //
        $input = $request->all();
        $add = $this->group->addData($input);

        return response()->json(['Status'=>$add]);
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
        $getGroup = $this->group->get()->where('ID_Group','=',$id);
        $GroupRs = GroupResource::collection($getGroup)->response()->getData(true);

        return response()->json(['data'=>$GroupRs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, $id)
    {
        //
        $input = $request->all();

        $edit = $this->group->editData($input, $id);
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
