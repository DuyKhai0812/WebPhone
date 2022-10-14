<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\PartnerRequest;
use App\Http\Resources\PartnerResource;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    protected $partner;
    public function __construct(Partner $pa)
    {
        $this->partner = $pa;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $show = $this->partner->get();
        $showRS = PartnerResource::collection($show)->response()->getData(true);

        return response()->json(['data'=>$showRS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {
        //
        $input = $request->all();
        $insert = $this->partner->addPar($input);

        return response()->json(['Status'=>$insert]);
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
        $show = $this->partner->get()->where("ID_Partner","=",$id);
        $showRS = PartnerResource::collection($show)->response()->getData(true);

        return response()->json(['data'=>$showRS]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, $id)
    {
        //
        $input = $request->all();
        $edit = $this->partner->editPar($input,$id);

        return response()->json(['Status'=>$edit]);
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
