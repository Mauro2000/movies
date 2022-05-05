<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movies_categories extends Model
{
    use HasFactory;

    protected $table = 'movies_categories';

    protected $fillable = [
        'image',
        'name',
    ];
}
