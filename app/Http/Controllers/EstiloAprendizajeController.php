<?php

namespace App\Http\Controllers;

use App\EstiloAprendizaje;
use Illuminate\Http\Request;

class EstiloAprendizajeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:estiloaprendizaje.create')->only(['create','store']);
        $this->middleware('permission:estiloaprendizaje.index')->only('index');
        $this->middleware('permission:estiloaprendizaje.edit')->only(['edit','update']);
        $this->middleware('permission:estiloaprendizaje.show')->only('show');
        $this->middleware('permission:estiloaprendizaje.destroy')->only('destroy');
        $this->middleware('permission:estiloaprendizaje.showdeletes')->only('showdeletes');
        $this->middleware('permission:estiloaprendizaje.restoredelete')->only('restoredelete');
    }
    
    public function index()
    {
        //
    }

    public function lista() {
        return EstiloAprendizaje::latest()->paginate(5);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstiloAprendizaje  $estiloAprendizaje
     * @return \Illuminate\Http\Response
     */
    public function show(EstiloAprendizaje $estiloAprendizaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstiloAprendizaje  $estiloAprendizaje
     * @return \Illuminate\Http\Response
     */
    public function edit(EstiloAprendizaje $estiloAprendizaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstiloAprendizaje  $estiloAprendizaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstiloAprendizaje $estiloAprendizaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstiloAprendizaje  $estiloAprendizaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstiloAprendizaje $estiloAprendizaje)
    {
        //
    }
}
