<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\movies;
use App\Models\covers;
class slidersHome extends Model
{
    use HasFactory;

    public function movies(){
        return $this->hasOne(movies::class,'id','movie_id');
      }

      public function cover(){
        return $this->hasOne(covers::class,'movie_id','movie_id');
      }
}
