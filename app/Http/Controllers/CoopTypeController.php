<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoopTypeRequest;
use App\Http\Requests\UpdateCoopTypeRequest;
use App\Models\CoopType;

class CoopTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCoopTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoopTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoopType  $coopType
     * @return \Illuminate\Http\Response
     */
    public function show(CoopType $coopType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoopType  $coopType
     * @return \Illuminate\Http\Response
     */
    public function edit(CoopType $coopType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoopTypeRequest  $request
     * @param  \App\Models\CoopType  $coopType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoopTypeRequest $request, CoopType $coopType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoopType  $coopType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoopType $coopType)
    {
        //
    }
}
