<?php

namespace App\Http\Controllers;

use App\Models\seasons;
use App\Http\Requests\StoreseasonsRequest;
use App\Http\Requests\UpdateseasonsRequest;

class SeasonsController extends Controller
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
     * @param  \App\Http\Requests\StoreseasonsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreseasonsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\seasons  $seasons
     * @return \Illuminate\Http\Response
     */
    public function show(seasons $seasons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\seasons  $seasons
     * @return \Illuminate\Http\Response
     */
    public function edit(seasons $seasons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateseasonsRequest  $request
     * @param  \App\Models\seasons  $seasons
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateseasonsRequest $request, seasons $seasons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\seasons  $seasons
     * @return \Illuminate\Http\Response
     */
    public function destroy(seasons $seasons)
    {
        //
    }
}
