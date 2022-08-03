<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\seasons;
use App\Models\movies;
use Carbon\Carbon;
class episodes extends Model
{
    use HasFactory;

    public function getseason(){
        return $this->hasMany(seasons::class,'id','season_id');
    }

    public function getMovie(){
        return $this->hasOne(movies::class,'id',$this->getseason()->movie_id);
    }

    public function getLastEoisode(){
        return $this->where('airdate','=',Carbon::now());
    }
}
