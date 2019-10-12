<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BurgaAfirmacion extends Model
{
    use SoftDeletes;

    protected $fillable =['id','nombre','deleted_at'];
}
