<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seasons extends Model
{
    use HasFactory;

    public function getmovies(){

        return $this->hasOne(movies::class,'id','movie_id');
    }
}
