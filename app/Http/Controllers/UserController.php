<?php

namespace App\Http\Controllers;
use App\Models\listOrders;
use App\Models\movies;
use Illuminate\Http\Request;
use App\IMDB\IMDB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotification;
use App\Models\Admins;
class UserController extends Controller
{
    public function getadmins(){
        return Admins::all();
    }

     public function AccountPage()
    {
        if(Auth::check()){
            return view('frontend.user.myAccount');
        }

    }

    public function AddOrder(){
        if(Auth::check()){
            $requests=listOrders::groupBy('IMDB')->select('IMDB','name', DB::raw('count(*) as votes'))->get();

            return view('frontend.user.addOrder',['requests'=>$requests]);
        }
        return abort(401);

    }
    public function addrequestid(Request $request){
        $this->validate($request,[
            "imdb"=>'bail|required|regex:/^(tt[0-9]{5,20})/'
        ]);

        $VerifyRequest=listOrders::where('user_id','=',Auth::user()->id)->where('IMDB','=',$request->imdb)->count();

        if($VerifyRequest >= '1'){
            return redirect()->route('addOrder')->with('error','O imdb id já foi pedido!');
        }

        $IMDB = new IMDB($request->imdb);

        if($IMDB->isReady){
          $poster = $IMDB->getPoster($sSize = 'small');
          $name = $IMDB->gettitle();
        }

        if(!Storage::exists('moviesfolder/'.$request->imdb)) {
            Storage::disk('moviesfolder')->put($request->imdb.'/'.$request->imdb.'.jpg', file_get_contents($poster));
        }

        $addRequest= new listOrders();
        $addRequest->user_id=Auth::user()->id;
        $addRequest->IMDB=$request->imdb;
        $addRequest->name=$name;

        if($addRequest->save()){
            Notification::send($this->getadmins(),new AdminNotification('O utilizador '.auth()->user()->name," pedio um filme/serie"));
            return redirect()->route('addOrder')->with('success','O imdb id já foi pedido!');
        }
    }
}
