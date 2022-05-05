<?php

namespace App\Http\Controllers;
use App\Traits\Uuids;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\slidersHome;
use App\Models\movies;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Models\episodes;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\Models\IPBLOCK;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;
use App\Models\GetMostCommonColors;
class PageController extends Controller
{

    protected $redirectTo = '/';

    public function __construct()
    {

    }
    public function youtube()
    {



    }

    public function filter(Request $request){


    }

    public function index(){



        $sliders=slidersHome::with('movies','cover')->orderBy('created_at', 'DESC')->get();

        $lancamentos=movies::with('cover')->where('tag','=','Lançamento')->where('status','=','1')->orderBy('created_at', 'DESC')->limit(8)->get();

        $movies=movies::with('cover')->where('type','=','Movie')->where('year','=','2021')->orwhere('year','=',date("Y"))->orderBy('created_at', 'DESC')->limit(8)->get();

        $series=movies::with('cover')->where('type','=','TV Series')->whereBetween('year',[Carbon::now()->subYear(1)->year,Carbon::now()->year])->orderBy('created_at', 'DESC')->limit(8)->get();


        return view('frontend.Homepage',[
            'sliders'=>$sliders,
            'Lancamentos'=>$lancamentos,
            'Series'=>$series,
            'Movies'=>$movies
        ]);
    }

    public function Logout(){
        Session::flush();

        Auth::logout();

        return redirect()->route('homepage');
    }

    public function show_movie_details(Request $request){

        $movie= movies::with('cover')->where('IMDB','=',$request->IMDB)->where('status','=','1')->first();



        if($movie != null){

            $casts=unserialize($movie->cast);
            $casts=str_replace('"','',$casts);

            return view('frontend.movie-details',[
                "movie"=>$movie,
                "casts"=>$casts
            ]);
        }
          return abort('404','Filme não disponivel');


    }

    public function show_serie_details(Request $request){

        $serie= movies::with('cover','seasons')->where('IMDB','=',$request->IMDB)->where('status','=','1')->first();

        if(Auth::check()){
            $User=User::with('getFollows')->where('id','=',Auth::user()->id)->first();
        }else{
            $User="";
        }



        $casts=unserialize($serie->cast);

        $casts=str_replace('"','',$casts);

        if($serie != null){

            return view('frontend.serie-details',[
                "serie"=>$serie,
                "casts"=>$casts,
                'user'=>$User
            ]);
        }
          return abort('404','Filme não disponivel');


    }

    public function getEpisodes(Request $request)
    {
        $dados=[];

        $episodes=episodes::where('season_id','=',$request->seasonid)->get();

        array_push($dados,[
            'Episodes'=>$episodes
        ]);

        echo json_encode($dados);

    }

    public function pageRegister(){
        return view('frontend.access-app.register');
    }

    public function pageLogin(){
        if(auth()->user()){
            return redirect()->route('homepage');
        }

        session()->put('url.intended',URL::previous());

        return view('frontend.access-app.login');
    }

    public function verifyRegister(Request $request){

        $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');

        $this->validate($request, [
            'email' => 'bail|required|email',
            'name_user' => 'bail|required',
            'password' => 'min:6|required_with:repet-password|same:repet-password',
            'repet-password' => 'min:6',
            'birthday'=>'bail|required|date|before:' . $before,
            'gender'=>'bail|required'
        ]);

        $user=new User();
        $user->name=$request->name_user;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->gender=$request->gender;
        $user->birthday=$request->birthday;

        if($user->save()){
            return redirect()->route('homepage')->with('message','Conta Criada com sucesso! Clique aqui para Iniciar Sessão');

            //


        }else{
            return redirect()->route('homepage')->with('error','Ocorreu um erro ao criar a conta! Tente novamente mais tarde!');

        }

    }

    public function verifyLogin(Request $request)
    {


        $this->checkTooManyFailedAttempts();

        $this->validate($request, [
            'email' => 'bail|required|email',
            'password' => 'bail|required|'

        ]);


        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        if(isset($request->remember)&& $request->remember=='on'){
            $remember='true';
        }else{
            $remember=false;
        }


        if(Auth::attempt($credentials,$remember)){

            RateLimiter::clear($this->throttleKey());

            return Redirect::to(session()->get('url.intended'));

        }else{

            RateLimiter::hit($this->throttleKey(), $seconds = 3600);

            return back()->with('error', 'Dados de Acesso incorretos.');

        }
    }


    public function throttleKey()
    {
        return Str::lower(request('email')) . '|' . request()->ip();
    }

    public function checkTooManyFailedAttempts()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
        IPBLOCK::where('IpAdress','=',request()->ip())->delete();
            return;
        }


        $ipblock= new IPBLOCK();
        $ipblock->IpAdress=request()->ip();
         $ipblock->save();

        return back()->with('error_attempts', 'Endereço IP banido. Muitas tentativas de login.');

    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            $data = movies::Where('status','=','1')->where('name','LIKE','%'.$request->search_query.'%')->orWhere('IMDB','LIKE','%'.$request->search_query.'%')->get();
            return response()->json($data);
        }
    }

    public function listSeries(Request $request)
    {
        $series =movies::where('type','!=','Movie')->where('status','=','1');

        if($request){

            if($request->has('search') && !empty($request->search)){
                $series->where('name','LIKE','%'.htmlspecialchars($request->search).'%')->orWhere('summary','LIKE','%'.htmlspecialchars($request->search).'%');
            }

            if ($request->has('year') && !empty($request->year)) {
                $series->where('year','=',$request->year);
            }

            if ($request->has('category')) {
                $series->where('categs','Like','%'.$request->category.'%');
            }

            if ($request->has('order')) {
                if($request->order=="dateDESC"){
                    $series->orderby('created_at','DESC');
                }

                if($request->order=="lancamento"){
                    $series->orderby('year','DESC');
                }

                if($request->order=="nameASC"){
                    $series->orderby('name','ASC');
                }

                if($request->order=="nameDESC"){
                    $series->orderby('name','DESC');
                }

                if($request->order=="votesDESC"){
                    $series->orderby('votes','DESC');
                }

                if($request->order=="votesASC"){
                    $series->orderby('votes','ASC');
                }

            }
        }

        $years=range(date('Y'), 2000);
        $categs=[
            'Action'=>"Ação",
            'Adventure'=>"Aventura",
            'History'=>'História',
            'Comedy'=>"Comédia",
            'Drama'=>"Drama",
            'Fantasy'=>"Fantasia",
            'Horror'=>"Terror",
            'Mystery'=>"Mistério",
           'Romance'=>"Romance",
            'Thriller'=>"Thriller",
            'Sci-Fi'=>'Ficção científica'
        ];
        asort($categs);
        $order=[
            'dateDESC'=>'Últimos Adicionados',
            'lancamento'=>'Últimos lançados',
            'nameASC'=>'A-Z',
            'nameDESC'=>'Z-A',
            'votesDESC'=>'Classificação maior',
            'votesASC'=>'Classificação menor',
        ];

        session()->flashInput($request->input());

        return view('frontend.list-all-series',[
            "years"=>$years,
            'categs'=>$categs,
            'orders'=>$order,
            'series'=>$series->Paginate(30)
        ]);
    }

    public function listMovies(Request $request)
    {
        $movies=movies::where('type','=','Movie')->where('status','=','1');

        if($request){

            if($request->has('search') && !empty($request->search)){
                $movies->where('name','LIKE','%'.htmlspecialchars($request->search).'%')->orWhere('name_collection','LIKE','%'.htmlspecialchars($request->search).'%')->orWhere('summary','LIKE','%'.htmlspecialchars($request->search).'%');
            }

            if ($request->has('year') && !empty($request->year)) {
                $movies->where('year','=',$request->year);
            }

            if ($request->has('category')) {
                $movies->where('categs','Like','%'.$request->category.'%');
            }

            if ($request->has('order')) {
                if($request->order=="dateDESC"){
                    $movies->orderby('created_at','DESC');
                }

                if($request->order=="lancamento"){
                    $movies->orderby('year','DESC');
                }

                if($request->order=="nameASC"){
                    $movies->orderby('name','ASC');
                }

                if($request->order=="nameDESC"){
                    $movies->orderby('name','DESC');
                }

                if($request->order=="votesDESC"){
                    $movies->orderby('votes','DESC');
                }

                if($request->order=="votesASC"){
                    $movies->orderby('votes','ASC');
                }

            }
        }

        $years=range(date('Y'), 2000);
        $categs=[
            'Action'=>"Ação",
            'Adventure'=>"Aventura",
            'History'=>'História',
            'Comedy'=>"Comédia",
            'Drama'=>"Drama",
            'Fantasy'=>"Fantasia",
            'Horror'=>"Terror",
            'Mystery'=>"Mistério",
           'Romance'=>"Romance",
            'Thriller'=>"Thriller",
            'Sci-Fi'=>'Ficção científica'
        ];
        asort($categs);
        $order=[
            'dateDESC'=>'Últimos Adicionados',
            'lancamento'=>'Últimos lançados',
            'nameASC'=>'A-Z',
            'nameDESC'=>'Z-A',
            'votesDESC'=>'Classificação maior',
            'votesASC'=>'Classificação menor',
        ];

        session()->flashInput($request->input());

        return view('frontend.list-all-movies',[
            "years"=>$years,
            'categs'=>$categs,
            'orders'=>$order,
            'movies'=>$movies->Paginate(30)
        ]);
    }
}
