<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use App\Http\Requests\StorewishlistRequest;
use App\Http\Requests\UpdatewishlistRequest;
use App\Models\movies;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class WishlistController extends Controller
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

    public function add(Request $request)
    {
        if (Auth::check()){
            $verify=wishlist::where('user_id','=',Auth::user()->id)->where('movie_id','=',$request->idIMDB)->count();

            if($verify >=1){
                wishlist::where('user_id','=',Auth::user()->id)->where('movie_id','=',$request->idIMDB)->delete();

            }else{
               $wishlist=new wishlist();
               $wishlist->user_id =Auth::user()->id;
               $wishlist->movie_id=$request->idIMDB;
                $wishlist->save();
            }
        }
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
     * @param  \App\Http\Requests\StorewishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorewishlistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewishlistRequest  $request
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatewishlistRequest $request, wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(wishlist $wishlist)
    {
        //
    }
}
