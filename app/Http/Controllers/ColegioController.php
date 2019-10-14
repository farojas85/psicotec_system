<?php

namespace App\Http\Controllers;

use App\Colegio;
use Illuminate\Http\Request;
use App\Imports\ColegiosImport;
use Maatwebsite\Excel\Facades\Excel;

class ColegioController extends Controller
{
    public function index()
    {
        return view('Configuraciones.Colegio.index');
    }

    public function lista()
    {
        return Colegio::paginate(10);
    }

    public function subir(Request $request)
    {
       Excel::import(new ColegiosImport,$request->file);
       return response()->json(['mensaje' => 'Colegios importados al Sistema, Satisfactoriamente']);
    }
    
}
