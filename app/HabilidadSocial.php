<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HabilidadSocial extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','nombre','descripcion','estado','deleted_at'];

}
