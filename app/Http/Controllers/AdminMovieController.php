<?php

namespace App\Http\Controllers;

use App\Models\movies_categories;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\covers;
use App\Models\slidersHome;
use Carbon\Carbon;

use App\Models\movies;
use Illuminate\Support\Facades\Storage;
use App\Notifications\AdminNotification;

class AdminMovieController extends Controller
{
    protected $AdminsNot;

    public function __construct(){
        $this->AdminsNot = Admins::Where('level','<','3')->get();


    }

    public function ListCategs(){

        $categ= movies_categories::all();

        return view('admin.movies.list_categ',['Categs'=>$categ]);

    }

    public function AddCategs(Request $request){
        $this->validate($request, [
            'Catname' => 'required',
        ]);
        $pathImage="";

        if($request->hasFile('file')){
            $request->validate([
                'file' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $request->file->store('Categs', 'moviesfolder');

            $pathImage=$request->file->hashName();
        }

        $Cat = new movies_categories([
            "name"=>$request->get('Catname'),
            "image"=>$pathImage
        ]);

        if( $Cat->save()){
            Notification::send( $this->AdminsNot,new AdminNotification(auth()->guard('admin')->user()->name,"adicionou uma nova Categoria"));

            return back()->with('success', 'Foi adinionado uma nova Categoria');
           }else{
            return back()->with('error', 'Erro ao adicionar uma nova Categoria');
           }

    }

    public function ListMovies(){

        $Movies= movies::with('cover','server')->paginate(5);

       // return $Movies;

        return view('admin.movies.list_movies',['Movies'=>$Movies]);

    }

    public function AddMovie(Request $request){

        $movie= new movies();

        $validated = $request->validate([
            'imdbid' => 'required|regex:/(tt)([0-9])\w+/',
            'type' => 'required|in:Movie,TV Series,TV Mini Series,TV Special,TV-PG,TV-MA,Video',
            'PosterImageDefault'=> 'nullable',
            'cast'=> 'required|array',
            'collection_name'=>'max:255',
            'trailer'=> 'required',
            'name'=>'required',
            'desc'=> 'required',
            'year'=> 'required|digits:4|integer|min:1900|max:'.(date('Y')+1).'',
            'time'=> 'required|',



        ]);

        $time=strstr($request->time, ' ', true);
        $hours = intdiv($time, 60).'h '. ($time % 60).'min';

        if($request->has('tag') && $request->tag =="Brevemente"){
            $movie->status='0';
        }

        if($request->has('collection')){
            $movie->collection='1';
            $movie->name_collection=$request->collection_name;
        }



        //ober cast
       $dados= json_decode($request->cast[0],true);


       if(!Storage::exists('moviesfolder/Cast')) {

        Storage::makeDirectory('moviesfolder/Cast', 0775, true); //creates directory

        }
        $movie->IMDB=$request->imdbid;
        $movie->votes=$request->votes;
        $movie->director=$request->director;
        $movie->Creator=$request->Creator;

        if($request->MPAA=="G"){
            $movie->MPAA="6";
        }else if($request->MPAA=="PG"){
            $movie->MPAA="6";
        }else if($request->MPAA=="PG-13"){
            $movie->MPAA="13";
        }else if($request->MPAA=="R"){
            $movie->MPAA="16";
        }else if($request->MPAA=="NC-17"){
            $movie->MPAA="18";
        }

        $movie->trailer=$request->trailer;
        $movie->image = $request->PosterImageDefault;
        $movie->name= $request->name;
        $movie->categs= $request->categs;
        $movie->summary= $request->desc;
        $movie->year= $request->year;
        $movie->time= $hours;
        $movie->type= $request->type;
        $movie->tag=$request->tag;
        $movie->country=$request->country;

        if($request->type=="TV Series" || $request->type=="TV Mini Series"){

            $movie->logo=$request->imdbid."Logo.png";
        }

        $namecasts = array();

        if(!empty($dados)){


            foreach($dados as $cast => $image){

                if($image!='cast/not-found.jpg'){
                    $namecasts[]=json_encode($cast);

                    if(!Storage::exists('moviesfolder/Cast/'.$cast.'.jpg')){

                        Storage::disk('moviesfolder')->put('/Cast/'.$cast.'.jpg', file_get_contents($image));
                    }
                }
               }
            }
        $movie->cast=serialize($namecasts);

        if($movie->save()){


            if(Storage::exists('moviesfolder/'.$request->imdbid)) {

                if($request->type=="TV Series" || $request->type=="TV Mini Series"){

                Storage::disk('moviesfolder')->put($request->imdbid.'/'.$request->imdbid.'Logo.png', file_get_contents($request->logo));
                }
                Storage::disk('moviesfolder')->put($request->imdbid.'/'.$request->imdbid.'cover.jpg', file_get_contents($request->cover));
                Storage::disk('moviesfolder')->put($request->imdbid.'/'.$request->imdbid.'.jpg', file_get_contents($request->PosterImageDefault));

                $cover=new covers();

                $cover->movie_id=$movie->id;
                $cover->image=$request->imdbid.'cover.jpg';
                if($cover->save()){
                    echo "ok";
                }

            }else{
                Storage::makeDirectory('moviesfolder/'.$request->imdbid, 0775, true); //creates directory

                if($request->type=="TV Series" || $request->type=="TV Mini Series"){
                Storage::disk('moviesfolder')->put($request->imdbid.'/'.$request->imdbid.'Logo.png', file_get_contents($request->logo));
                }
                Storage::disk('moviesfolder')->put($request->imdbid.'/'.$request->imdbid.'cover.jpg', file_get_contents($request->cover));
                Storage::disk('moviesfolder')->put($request->imdbid.'/'.$request->imdbid.'.jpg', file_get_contents($request->PosterImageDefault));

                $cover=new covers();

                $cover->movie_id=$movie->id;
                $cover->image=$request->imdbid.'cover.jpg';
                if($cover->save()){
                   return redirect()->route('adminListMovies');
                }
            }
        }



       return $request;

    }

    public function ListSliders(){

        $sliders=slidersHome::with('movies')->paginate(5);
        $Movies= movies::orderBy('id', 'desc')->take(15)->get();

       // return $Movies;

        return view('admin.list_sliders',[
            'sliders'=>$sliders,
            'movies'=>$Movies
        ]);

    }

    public function AddSlider(Request $request){
        $this->validate($request, [
            'movieId' => 'required|numeric',
            'message'=>'required|string'
        ]);

        $slider=new slidersHome;

        $slider->movie_id = $request->movieId;
        $slider->message = $request->message;

        if( $slider->save()){
            Notification::send( $this->AdminsNot,new AdminNotification(auth()->guard('admin')->user()->name,"adicionou um novo Slider"));

            return back()->with('success', 'Foi adicionado um novo Slider');
        }else{
            return back()->with('error', 'Erro ao adicionar um novo Slider');
        }


    }

    public function DeleteSlider(Request $request){
        $sliders=slidersHome::where('id',$request->id)->delete();

        Notification::send( $this->AdminsNot,new AdminNotification(auth()->guard('admin')->user()->name,"apagou um Slider"));


        return back()->with('success', 'Foi Apagado um Slider');
    }
}
