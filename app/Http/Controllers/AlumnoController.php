<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\User;
use App\Persona;
use Peru\Http\ContextClient;
use Peru\Jne\{Dni, DniParser};
use Illuminate\Http\Request;
use App\Colegio;
class AlumnoController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Alumno $alumno)
    {
        //
    }

    public function edit(Alumno $alumno)
    {
        //
    }

    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    public function destroy(Alumno $alumno)
    {
        //
    }

    public function buscarDni(Request $request) 
    {
        $persona = (new Dni(new ContextClient(),new DniParser()))->get($request->dni);

        if(!$persona) return "false";
        
        return json_encode($persona);

    }

    public function getDepartamentos()
    {
        return Colegio::select('departamento')->groupBy('departamento')
                    ->orderBy('departamento','ASC')->get();
    }
}
