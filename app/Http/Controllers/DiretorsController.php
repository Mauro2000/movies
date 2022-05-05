<?php

namespace App\Http\Controllers;

use App\Models\diretors;
use App\Http\Requests\StorediretorsRequest;
use App\Http\Requests\UpdatediretorsRequest;

class DiretorsController extends Controller
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
     * @param  \App\Http\Requests\StorediretorsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorediretorsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diretors  $diretors
     * @return \Illuminate\Http\Response
     */
    public function show(diretors $diretors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diretors  $diretors
     * @return \Illuminate\Http\Response
     */
    public function edit(diretors $diretors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatediretorsRequest  $request
     * @param  \App\Models\diretors  $diretors
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatediretorsRequest $request, diretors $diretors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diretors  $diretors
     * @return \Illuminate\Http\Response
     */
    public function destroy(diretors $diretors)
    {
        //
    }
}
