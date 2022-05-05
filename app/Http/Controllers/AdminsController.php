<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\settings;
use App\Http\Requests\StoreAdminsRequest;
use App\Http\Requests\UpdateAdminsRequest;
use App\Models\movies;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotification;
use Illuminate\Http\Request;

class AdminsController extends Controller
{

    protected $AdminsNot;


    public function dashboard()
    {
        $series=movies::where('type','TV Series')->orWhere('type','TV Mini Series')->count();
        $movies=movies::where('type','Movie')->count();
        $users=User::count();
        return view('admin.dashboard',['series'=>$series,'movies'=>$movies,'users'=>$users]);
    }

    public function send(){
        $this->AdminsNot = Admins::Where('level','<','3')->get();

        Notification::send( $this->AdminsNot,new AdminNotification(auth()->guard('admin')->user()->name,"adicionou um novo utilizador"));

    }


    public function settings(){

        $settings=settings::all();


       foreach($settings as $setting){
            if($setting->name=="colors"){
                $color[] = unserialize($setting->value);
            }
        }





        return view('admin.settings',[
            "colors"=>$color
        ]);

    }

    public function uploadSettings(Request $request){

        $settings=settings::all();

       /*  $this->validate($request,[
            "primary" => 'bail|regex:/(^?:#|0x)(?:[a-f0-9]{3}|[a-f0-9]{6})\b|(?:rgb|hsl)a?\([^\)]*\)/m',
            "secundary" => 'bail|regex:/(^?:#|0x)(?:[a-f0-9]{3}|[a-f0-9]{6})\b|(?:rgb|hsl)a?\([^\)]*\)/m',
        ]); */

        $colors=[
            'primary'=>$request->primary,
            'secundary'=>$request->secundary
        ];


        foreach($settings as $setting){
            if($setting->name=="colors"){
                $setting->value = serialize($colors) ;
            }
            if($setting->name=="font_site"){
                $setting->value =$request->font_site ;
            }
            $setting->save();
        }




        return redirect()->back()->with('success', 'Foi adinionado uma nova Serie');


    }
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
     * @param  \App\Http\Requests\StoreAdminsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit(Admins $admins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminsRequest  $request
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminsRequest $request, Admins $admins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admins $admins)
    {
        //
    }
}
