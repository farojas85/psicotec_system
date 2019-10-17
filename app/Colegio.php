<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    protected $fillable=['id','codigo_modular','nombre','nivel_modalidad',
                            'gestion_dependencia','ubigeo','departamento','provincia',
                            'distrito'];
    
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}
