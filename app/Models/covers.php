<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\movies;

class covers extends Model
{
    use HasFactory;

    public function getmovies(){
        return $this->belongsToMany(movies::class);
    }
}
