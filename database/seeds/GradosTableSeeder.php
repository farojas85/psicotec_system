<?php

use App\Grado;
use Illuminate\Database\Seeder;

class GradosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::create(['nombre' => '1°']);
        Grado::create(['nombre' => '2°']);
        Grado::create(['nombre' => '3°']);
        Grado::create(['nombre' => '4°']);
        Grado::create(['nombre' => '5°']);
    }
}

