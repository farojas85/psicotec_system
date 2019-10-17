<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    
    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }
}
