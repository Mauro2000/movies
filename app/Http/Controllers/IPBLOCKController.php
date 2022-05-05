<?php

namespace App\Http\Controllers;

use App\Models\IPBLOCK;
use App\Http\Requests\StoreIPBLOCKRequest;
use App\Http\Requests\UpdateIPBLOCKRequest;

class IPBLOCKController extends Controller
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
     * @param  \App\Http\Requests\StoreIPBLOCKRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIPBLOCKRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IPBLOCK  $iPBLOCK
     * @return \Illuminate\Http\Response
     */
    public function show(IPBLOCK $iPBLOCK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IPBLOCK  $iPBLOCK
     * @return \Illuminate\Http\Response
     */
    public function edit(IPBLOCK $iPBLOCK)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIPBLOCKRequest  $request
     * @param  \App\Models\IPBLOCK  $iPBLOCK
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIPBLOCKRequest $request, IPBLOCK $iPBLOCK)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IPBLOCK  $iPBLOCK
     * @return \Illuminate\Http\Response
     */
    public function destroy(IPBLOCK $iPBLOCK)
    {
        //
    }
}
