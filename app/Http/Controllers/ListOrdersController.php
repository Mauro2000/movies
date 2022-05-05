<?php

namespace App\Http\Controllers;

use App\Models\listOrders;
use App\Http\Requests\StorelistOrdersRequest;
use App\Http\Requests\UpdatelistOrdersRequest;

class ListOrdersController extends Controller
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
     * @param  \App\Http\Requests\StorelistOrdersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelistOrdersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\listOrders  $listOrders
     * @return \Illuminate\Http\Response
     */
    public function show(listOrders $listOrders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\listOrders  $listOrders
     * @return \Illuminate\Http\Response
     */
    public function edit(listOrders $listOrders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelistOrdersRequest  $request
     * @param  \App\Models\listOrders  $listOrders
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelistOrdersRequest $request, listOrders $listOrders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\listOrders  $listOrders
     * @return \Illuminate\Http\Response
     */
    public function destroy(listOrders $listOrders)
    {
        //
    }
}
