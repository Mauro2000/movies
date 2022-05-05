<?php

namespace App\Http\Controllers;

use App\Models\movies_categories;
use App\Http\Requests\Storemovies_categoriesRequest;
use App\Http\Requests\Updatemovies_categoriesRequest;

class MoviesCategoriesController extends Controller
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
     * @param  \App\Http\Requests\Storemovies_categoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storemovies_categoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movies_categories  $movies_categories
     * @return \Illuminate\Http\Response
     */
    public function show(movies_categories $movies_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movies_categories  $movies_categories
     * @return \Illuminate\Http\Response
     */
    public function edit(movies_categories $movies_categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatemovies_categoriesRequest  $request
     * @param  \App\Models\movies_categories  $movies_categories
     * @return \Illuminate\Http\Response
     */
    public function update(Updatemovies_categoriesRequest $request, movies_categories $movies_categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movies_categories  $movies_categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(movies_categories $movies_categories)
    {
        //
    }
}
