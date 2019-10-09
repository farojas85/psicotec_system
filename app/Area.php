<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use SoftDeletes;

    protected $fillable =['id','siglas','nombre','estado','deleted_at'];
}
