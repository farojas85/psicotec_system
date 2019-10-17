<?php

use App\Seccion;
use Illuminate\Database\Seeder;

class SeccionsTableSeeder extends Seeder
{
    public function run()
    {
        Seccion::firstOrCreate(['nombre' => 'A']);
        Seccion::firstOrCreate(['nombre' => 'B']);
        Seccion::firstOrCreate(['nombre' => 'C']);
        Seccion::firstOrCreate(['nombre' => 'D']);
        Seccion::firstOrCreate(['nombre' => 'E']);
        Seccion::firstOrCreate(['nombre' => 'F']);
        Seccion::firstOrCreate(['nombre' => 'G']);
        Seccion::firstOrCreate(['nombre' => 'H']);
        Seccion::firstOrCreate(['nombre' => 'I']);
    }
}
