<?php

namespace App\Imports;

use App\Colegio;
use Maatwebsite\Excel\Concerns\ToModel;

class ColegiosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $colegio_count = Colegio::where('codigo_modular',$row[0])->count();

        if($colegio_count== 0) {
            return new Colegio([
                'codigo_modular' => $row[0],
                'nombre' => $row[1],
                'nivel_modalidad' => $row[2],
                'gestion_dependencia' => $row[3],
                'ubigeo' => $row[5],
                'departamento' => $row[6],
                'provincia' => $row[7],
                'distrito' => $row[8]
            ]);         
        }
    }
}
