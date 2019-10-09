<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tabla.create')->only(['create','store']);
        $this->middleware('permission:tabla.index')->only('index');
        $this->middleware('permission:tabla.edit')->only(['edit','update']);
        $this->middleware('permission:tabla.show')->only('show');
        $this->middleware('permission:tabla.destroy')->only('destroy');
    }
    public function index()
    {
        return view('Configuraciones.index');
    }
}
