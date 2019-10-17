<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function persona()
    {
        return $this->hasOne(Persona::class);
    }
}
