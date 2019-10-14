<?php

use App\Seccion;
use Illuminate\Database\Seeder;

class SeccionsTableSeeder extends Seeder
{
    public function run()
    {
        Seccion::create(['nombre' => 'A']);
        Seccion::create(['nombre' => 'B']);
        Seccion::create(['nombre' => 'C']);
        Seccion::create(['nombre' => 'D']);
        Seccion::create(['nombre' => 'E']);
        Seccion::create(['nombre' => 'F']);
        Seccion::create(['nombre' => 'G']);
        Seccion::create(['nombre' => 'H']);
        Seccion::create(['nombre' => 'I']);
    }
}
