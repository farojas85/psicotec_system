<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BurgaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:burga.index')->only('index');
    }
    public function index()
    {
        return View('Configuraciones.test_burga.index');
    }
}
