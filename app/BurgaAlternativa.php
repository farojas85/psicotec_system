<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BurgaAlternativa extends Model
{
    use SoftDeletes;

    protected $fillable =['id','nombre','deleted_at'];
}
