<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BurgaAfirmacion extends Model
{
    use SoftDeletes;

    protected $fillable =['id','nombre','deleted_at'];

    public function habilidad_socials()
    {
        return $this->belongsToMany(HabilidadSocial::class)->withTimestamps()
                    ->select('id','nombre');
    }
}
