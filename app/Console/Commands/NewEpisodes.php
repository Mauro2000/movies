<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\episodes;
use Carbon\Carbon;
use App\Models\Admins;
use App\Models\seasons;
use App\Models\slidersHome;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotification;
use App\Notifications\UsersNotification;

class NewEpisodes extends Command
{

    protected $Users;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'episodes:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buscar Episodes novos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->Users = User::all();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $episodes = episodes::where('airdate','=',Carbon::today()->subDay(3))->get();
        $episodestoday = episodes::where('airdate','=',Carbon::today())->get();

        $result = $episodes->merge($episodestoday);
        $result = $result->all();

        $result = $episodes->merge($episodestoday);
        $result = $result->all();

        foreach($result as $episode){
                $movies =seasons::where('id','=',$episode->season_id)->first();

                $verify=slidersHome::where('movie_id','=',$movies->movie_id)->first();
                if($verify){
                    $verify->message="JÁ DISPONÍVEL O EPISÓDIO ".$episode->episode." DA TEMPORADA ".$movies->season;
                    $verify->save();
                }else{
                    $slider = new slidersHome();
                    $slider->movie_id=$movies->movie_id;
                    $slider->message="JÁ DISPONÍVEL O EPISÓDIO ".$episode->episode." DA TEMPORADA ".$movies->season;
                    $slider->status='1';
                    if($slider->save()){
                        Notification::send( $this->Users,new UsersNotification('JÁ DISPONÍVEL O EPISÓDIO',".$episode->episode.","ola",'ola'));
                    }
                }





        }




    }
}
