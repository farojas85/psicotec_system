<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','nombre','area_id','personalidad_id','estado','deleted_at'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function personalidad()
    {
        return $this->belongsTo(Personalidad::class);
    }
}
