<?php
namespace App\Http\Controllers;


require_once '../app/DOM/DOM.php';

use Illuminate\Http\Request;
use App\Models\movies;
use App\Models\covers;
use App\Models\episodes;
use App\Models\User;
use App\Models\Admins;
use App\Models\seasons;
use CodeBugLab\OpenSubtitles\Facades\OpenSubtitles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class AdminSerieController extends Controller
{

    protected $AdminsNot;

    public function __construct(){
        $this->AdminsNot = Admins::Where('level','<','3')->get();


    }


    public function ListSeries(){

        $Movies= movies::with('cover','seasons')->where('type','=','TV Series')->orWhere('type','=','TV Mini Series')->orderBy('created_at','DESC')->paginate(5);

        return view('admin.series.list_series',[
            "Series"=>$Movies,

        ]);
    }

    public function AddSerie(Request $request){

        $tempData = str_replace("\\", "",$request->seasons);
        $tempDatas = str_replace(" ", "",$request->seasons);
        $cleanData = json_decode($tempDatas);


        $movie= new movies();

        $validated = $request->validate([
            'imdbid' => 'required',
            'type' => 'required|in:TV Series,TV Mini Series,TV Special,TV-PG',
            'PosterImageDefault'=> 'nullable',
            'cast'=> 'required|array',
            'votes'=> 'required',
            'trailer'=> 'required',

            'name'=>'required',
            'desc'=> 'required',
            'year'=> 'required|digits:4|integer|min:1900|max:'.(date('Y')+1).'',
            'time'=> 'required|'
        ]);




        if(isset($request->poster)){

            $this->validate($request, [
                'poster' => ['url','regex:/(^https?:\/\/.*\.(?:png|jpg|svg))/i'],
            ]);

            $Poster= $request->poster;

        }else{
            $this->validate($request, [
                'PosterImageDefault' => ['url','regex:/(^https?:\/\/.*\.(?:png|jpg|svg))/i'],
            ]);
          $Poster=$request->PosterImageDefault;
        }

        $time=strstr($request->time, ' ', true);
        $hours = intdiv($time, 60).'h '. ($time % 60).'min';

        $dados= json_decode($request->cast[0],true);


        if(!Storage::exists('moviesfolder/Cast')) {

            Storage::makeDirectory('moviesfolder/Cast', 0775, true); //creates directory

        }
        $movie->IMDB=$request->imdbid;
        $movie->votes=$request->votes;
        $movie->director=$request->director;

        if($request->creator){
            $movie->Creator=$request->Creator;
        }else{
            $movie->Creator="N/A";
        }


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
        }else{
            $movie->MPAA="N/a";
        }

        $movie->trailer=$request->trailer;

        $movie->image = $Poster;
        $movie->name= $request->name;
        $movie->categs= $request->categs;
        $movie->summary= $request->desc;
        $movie->year= $request->year;
        $movie->time= $hours;
        $movie->type= $request->type;
        $movie->country=$request->country;


        $namecasts = array();

        if(is_array($dados)){
            foreach($dados as $cast => $image){

                if($image!='cast/not-found.jpg'){
                    $namecasts[]=json_encode($cast);

                    if(!Storage::exists('moviesfolder/Cast/'.$cast.'.jpg')){

                        Storage::disk('moviesfolder')->put('/Cast/'.$cast.'.jpg', file_get_contents($image));
                    }
                }
               }
            }
            if($request->logo){
                $ext = pathinfo($request->logo, PATHINFO_EXTENSION);
                $movie->logo=$request->imdbid.'logo.'.$ext;
            }
        $movie->cast=serialize($namecasts);

        if($movie->save()){

            if(is_array($cleanData)){
                foreach($cleanData as $sesaon){
                    $sesaons= new seasons();
                    $sesaons->movie_id=$movie->id;
                    $sesaons->season=$sesaon;
                    $sesaons->save();
                }
            }

            if(Storage::exists('moviesfolder/'.$request->imdbid)) {

                if($request->logo){
                    $ext = pathinfo($request->logo, PATHINFO_EXTENSION);
                    Storage::disk('moviesfolder')->put($request->imdbid.'/'.$request->imdbid.'logo.'.$ext, file_get_contents($request->logo));
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

                if($request->logo){
                    $ext = pathinfo($request->logo, PATHINFO_EXTENSION);
                    Storage::disk('moviesfolder')->put($request->imdbid.'/'.$request->imdbid.'logo.'.$ext, file_get_contents($request->logo));
                }

                Storage::disk('moviesfolder')->put($request->imdbid.'/'.$request->imdbid.'cover.jpg', file_get_contents($request->cover));
                Storage::disk('moviesfolder')->put($request->imdbid.'/'.$request->imdbid.'.jpg', file_get_contents($Poster));

                $cover=new covers();

                $cover->movie_id=$movie->id;
                $cover->image=$request->imdbid.'cover.jpg';
                if($cover->save()){
                    Notification::send( $this->AdminsNot,new AdminNotification(auth()->guard('admin')->user()->name,"adicionou uma nova Categoria"));

                    return back()->with('success', 'Foi adinionado uma nova Serie');
                   }else{
                    return back()->with('error', 'Erro ao adicionar uma nova Serie');
                }
            }

        }
        return $request;
    }

    public function GenerateEpisode(Request $request)
    {
        $movie=movies::with('seasons')->find($request->idmovie);



        if($movie && $movie->IMDB == $request->imdbid){

            set_time_limit(0);

            foreach($movie->seasons as $season){

            $dom = file_get_html('https://www.imdb.com/title/'.$request->imdbid.'/episodes?season='.$season->season.'', true);

            $article = array();

            if(!empty($dom)){
                $div_class = $title = "";
                $i = 0;
                $dados=[];
                foreach($dom->find(".list_item") as $div_class) {
                    // article title
                    foreach($div_class->find("strong") as $title ) {
                        $article[$i]['episode']=$i+1;
                        $article[$i]['title'] = $title->plaintext;
                    }
                    foreach($div_class->find(".hover-over-image .zero-z-index") as $image ) {
                        //if(array_key_exists('image',$image)){
                            $article[$i]['image']= $image->src;
                       // }else{
                         //   $article[$i]['image']="default";
                        //}

                    }
                    foreach($div_class->find('.item_description') as $desc){
                        $article[$i]['desc']=$desc->plaintext;
                    }

                    foreach($div_class->find('.info .airdate') as $date){
                        $article[$i]['date']=trim(str_replace('.','',$date->plaintext));
                    }
                    $i++;
                }
                foreach ($article as $episodes){

                    $verify= episodes::where('season_id','=',$season->id)->where('episode','=',$episodes['episode'])->count();


                    if($verify >=1){

                        $pattern="/^([0-3]?[0-9]|(3)[0-1]) (?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Sept|Oct|Nov|Dec) \d{4}$/";
                        if(preg_match($pattern,$episodes['date'])){
                            $airdate= Carbon::createFromFormat('d M Y', $episodes['date'])->format('Y/m/d H:i:s');
                        }else{
                            $airdate=NULL;
                        }

                        if(array_key_exists('image',$episodes)){
                            Storage::disk('moviesfolder')->put($request->imdbid.'/Season '.$season->season.'/'.$episodes['episode'].'/'.$request->imdbid.'thumbnail.jpg', file_get_contents($episodes['image']));
                        }

                        episodes::where('season_id','=',$season->id)->where('episode','=',$episodes['episode'])->update([
                            "episode"=>$episodes['episode'],
                            'name'=>$episodes['title'],
                            'des'=>$episodes['desc'],
                            'airdate'=>$airdate,
                            'image'=>$request->imdbid.'/Season '.$season->season.'/'.$episodes['episode'].'/'.$request->imdbid.'thumbnail.jpg'

                        ]);

                    }else{
                    $epi=new episodes();
                    $epi->season_id=$season->id;
                    $epi->episode=$episodes['episode'];
                    $epi->name=$episodes['title'];
                    $epi->des=$episodes['desc'];

                    $pattern="/^([0-3]?[0-9]|(3)[0-1]) (?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Sept|Oct|Nov|Dec) \d{4}$/";
                    if(preg_match($pattern,$episodes['date'])){
                        $epi->airdate= Carbon::createFromFormat('d M Y', $episodes['date'])->format('Y/m/d H:i:s');
                    }else{
                        $epi->airdate=NULL;
                    }



                    if(array_key_exists('image',$episodes)){
                        Storage::disk('moviesfolder')->put($request->imdbid.'/Season '.$season->season.'/'.$episodes['episode'].'/'.$request->imdbid.'thumbnail.jpg', file_get_contents($episodes['image']));
                    }
                        $epi->image=$request->imdbid.'/Season '.$season->season.'/'.$episodes['episode'].'/'.$request->imdbid.'thumbnail.jpg';
                        $epi->save();


                    }

                }

            }





        }



      }
    }
}
