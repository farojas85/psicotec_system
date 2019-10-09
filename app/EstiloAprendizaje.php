<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class EstiloAprendizaje extends Model
{
    use SoftDeletes;

    protected $fillable =['id','nombre','descripcion','estado','deleted_at'];
}
