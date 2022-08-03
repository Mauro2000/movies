<?php

namespace App\Models;
use App\Models\covers;
use App\Models\servers;
use App\Models\seasons;
use App\Models\episodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    protected $table = 'movies';

    use HasFactory;

    public function __construct(){
        $this->cast=unserialize($this->cast);
        return $this->cast;
    }


    public function cover(){

        return $this->hasMany(covers::class, 'movie_id','id');
    }

    public function server(){
        return $this->hasMany(servers::class, 'movie_id','id');
    }

    public function seasons(){
        return $this->hasMany(seasons::class, 'movie_id','id');
    }

    public function dateEpisodes(){
        return $this->hasMany(episodes::class, 'movie_id','id');
    }
}
