<?php

namespace App\Http\Controllers;

use App\Models\covers;
use App\Http\Requests\StorecoversRequest;
use App\Http\Requests\UpdatecoversRequest;

class CoversController extends Controller
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
     * @param  \App\Http\Requests\StorecoversRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecoversRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\covers  $covers
     * @return \Illuminate\Http\Response
     */
    public function show(covers $covers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\covers  $covers
     * @return \Illuminate\Http\Response
     */
    public function edit(covers $covers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecoversRequest  $request
     * @param  \App\Models\covers  $covers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecoversRequest $request, covers $covers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\covers  $covers
     * @return \Illuminate\Http\Response
     */
    public function destroy(covers $covers)
    {
        //
    }
}
