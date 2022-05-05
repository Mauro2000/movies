<?php

namespace App\Http\Controllers;

use App\Models\episodes;
use App\Http\Requests\StoreepisodesRequest;
use App\Http\Requests\UpdateepisodesRequest;

class EpisodesController extends Controller
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
     * @param  \App\Http\Requests\StoreepisodesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreepisodesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\episodes  $episodes
     * @return \Illuminate\Http\Response
     */
    public function show(episodes $episodes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\episodes  $episodes
     * @return \Illuminate\Http\Response
     */
    public function edit(episodes $episodes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateepisodesRequest  $request
     * @param  \App\Models\episodes  $episodes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateepisodesRequest $request, episodes $episodes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\episodes  $episodes
     * @return \Illuminate\Http\Response
     */
    public function destroy(episodes $episodes)
    {
        //
    }
}
