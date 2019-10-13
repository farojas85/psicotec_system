<?php

namespace App\Http\Controllers;

use App\Colegio;
use Illuminate\Http\Request;

class ColegioController extends Controller
{
    public function index()
    {
        return view('Configuraciones.Colegio.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Colegio $colegio)
    {
        //
    }

    public function edit(Colegio $colegio)
    {
        //
    }


    public function update(Request $request, Colegio $colegio)
    {
        //
    }


    public function destroy(Colegio $colegio)
    {
        //
    }
}
