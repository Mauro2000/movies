<?php

namespace App\Http\Controllers;

use App\Models\servers;
use App\Http\Requests\StoreserversRequest;
use App\Http\Requests\UpdateserversRequest;

class ServersController extends Controller
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
     * @param  \App\Http\Requests\StoreserversRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreserversRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\servers  $servers
     * @return \Illuminate\Http\Response
     */
    public function show(servers $servers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servers  $servers
     * @return \Illuminate\Http\Response
     */
    public function edit(servers $servers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateserversRequest  $request
     * @param  \App\Models\servers  $servers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateserversRequest $request, servers $servers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servers  $servers
     * @return \Illuminate\Http\Response
     */
    public function destroy(servers $servers)
    {
        //
    }
}
