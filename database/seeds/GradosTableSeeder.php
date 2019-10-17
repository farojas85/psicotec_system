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
        Grado::firstOrCreate(['nombre' => '1°']);
        Grado::firstOrCreate(['nombre' => '2°']);
        Grado::firstOrCreate(['nombre' => '3°']);
        Grado::firstOrCreate(['nombre' => '4°']);
        Grado::firstOrCreate(['nombre' => '5°']);
    }
}

