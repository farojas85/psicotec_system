<?php

namespace App\Http\Controllers;

use App\Personalidad;
use Illuminate\Http\Request;

class PersonalidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:personalidad.create')->only(['create','store']);
        $this->middleware('permission:personalidad.index')->only('index');
        $this->middleware('permission:personalidad.edit')->only(['edit','update']);
        $this->middleware('permission:personalidad.show')->only('show');
        $this->middleware('permission:personalidad.destroy')->only('destroy');
        $this->middleware('permission:personalidad.showdeletes')->only('showdeletes');
        $this->middleware('permission:personalidad.restoredelete')->only('restoredelete');
    }

    public function index()
    {
        //
    }

    public function lista() {
        return Personalidad::latest()->paginate(5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|min:2',
            'nombre' => 'required|string|max:191',
        ]);

        $personalidad = Personalidad::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre
        ]);

        return response()->json(['mensaje' => 'Registro Insertado Satisfactoriamente']);
    }

    public function show(Request $request)
    {
        return Personalidad::findOrFail($request->id);
    }

    public function update(Request $request)
    {
        $personalidad = Personalidad::findOrFail($request->id);

        $personalidad->codigo = $request->codigo;
        $personalidad->nombre = $request->nombre;
        $personalidad->estado = $request->estado;
        $personalidad->save();

        return response()->json(['mensaje' => 'Registro Insertado Satisfactoriamente']);
    }

    public function destroy(Request $request)
    {
        $personalidad = Personalidad::findOrFail($request->id);

        $personalidad->delete();

        return response()->json(['mensaje' => 'Registro Eliminado Satisfactoriamente']);
    }

    public function showdeletes() 
    {
        return Personalidad::onlyTrashed()->latest()->paginate(5);
    }

    public function restoredelete(Request $request) 
    {
        $personalidad = Personalidad::onlyTrashed()->where('id',$request->id)->first();

        $personalidad->restore();

        return response()->json(['mensaje' => 'Registro Restaurado Satisfactoriamente']);
    }
}
