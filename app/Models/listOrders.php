<?php

namespace App\Models;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\movies;
class listOrders extends Model
{
    Use Uuids;

    public $incrementing = false;

    protected $keyType = 'uuid';

    use HasFactory;



}
