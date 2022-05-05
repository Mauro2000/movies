<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\seasons;
class episodes extends Model
{
    use HasFactory;

    public function getseason(){
        return $this->belongsToMany(seasons::class);
    }
}
