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

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:191|unique:estilo_aprendizajes,nombre'
        ]);

        $request->descripcion = str_replace(".",".\n",$request->descripcion);

        $estilo = EstiloAprendizaje::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);

        return response()->json(['mensaje' => 'Registro Insertado Satisfactoriamente']);
    }

    public function show(Request $request)
    {
        return EstiloAprendizaje::findOrFail($request->id);
    }

    public function edit(EstiloAprendizaje $estiloAprendizaje)
    {
        //
    }

    public function update(Request $request)
    {
        $estilo = EstiloAprendizaje::findOrfail($request->id);

        $estilo->nombre = $request->nombre;
        $estilo->descripcion = $request->descripcion;
        $estilo->estado = $request->estado;
        $estilo->save();

        return response()->json(['mensaje' => 'Registro Modificado Satisfactoriamente']);
    }

    public function destroy(Request $request)
    {
        $estilo = EstiloAprendizaje::findOrFail($request->id);
        //Eliminamos el Estilo de Aprendizaje
        $estilo->delete();

        return response()->json(['mensaje' => 'Registro Eliminado Satisfactoriamente']);
    }

    public function showdeletes()
    {
        return EstiloAprendizaje::onlyTrashed()->latest()->paginate(5);
    }

    public function restoredelete(Request $request) {
        $estilo = EstiloAprendizaje::onlyTrashed()->where('id',$request->id)->first();
        //Restauramos el Estilo de Aprendizaje
        $estilo->restore();

        return response()->json(['mensaje' => 'Registro Restaurado Satisfactoriamente']);
    }
}
