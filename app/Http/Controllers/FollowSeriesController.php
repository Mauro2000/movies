<?php

namespace App\Http\Controllers;

use App\Models\followSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FollowSeriesController extends Controller
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

    public function follow(Request $request){

        if(Auth::check()){
            $return_arr = array();

            $verify=followSeries::where('user_id','=',Auth::user()->id)->where('movie_id','=',$request->idIMDB)->count();
            if($verify >= 1){
                followSeries::where('user_id','=',Auth::user()->id)->where('movie_id','=',$request->idIMDB)->delete();
                $return_arr[] = array('code'=>'1');
            }else{
                $follow=new followSeries();
                $follow->movie_id=$request->idIMDB;
                $follow->user_id =Auth::user()->id;
                $follow->save();
                $return_arr[] = array('code'=>'2');
            }
            echo json_encode($return_arr);
        }else{
            abort(403);
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
     * @param  \App\Http\Requests\StorefollowSeriesRequest  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\followSeries  $followSeries
     * @return \Illuminate\Http\Response
     */
    public function show(followSeries $followSeries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\followSeries  $followSeries
     * @return \Illuminate\Http\Response
     */
    public function edit(followSeries $followSeries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefollowSeriesRequest  $request
     * @param  \App\Models\followSeries  $followSeries
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\followSeries  $followSeries
     * @return \Illuminate\Http\Response
     */
    public function destroy(followSeries $followSeries)
    {
        //
    }
}
