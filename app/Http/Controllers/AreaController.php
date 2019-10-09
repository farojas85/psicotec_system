<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:area.create')->only(['create','store']);
        $this->middleware('permission:area.index')->only('index');
        $this->middleware('permission:area.edit')->only(['edit','update']);
        $this->middleware('permission:area.show')->only('show');
        $this->middleware('permission:area.destroy')->only('destroy');
        $this->middleware('permission:area.showdeletes')->only('showdeletes');
        $this->middleware('permission:area.restoredelete')->only('restoredelete');
    }

    public function index()
    {
        return view('Configuraciones.Area.index');
    }

    public function lista() {
        return Area::latest()->paginate(5);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'siglas' => 'required|string|min:4',
            'nombre' => 'required|string|max:191',
        ]);

        $area = Area::create([
            'siglas' => $request->siglas,
            'nombre' => $request->nombre
        ]);

        return response()->json(['mensaje' => 'Registro Insertado Satisfactoriamente']);
    }

    public function show(Request $request)
    {
        return Area::findOrFail($request->id);
    }

    public function edit(Area $area)
    {
        //
    }

    public function update(Request $request)
    {
        $area = Area::findOrFail($request->id);

        $area->siglas= $request->siglas;
        $area->nombre= $request->nombre;
        $area->estado= $request->estado;
        $area->save();

        return response()->json(['mensaje' => 'Registro Actualizado Satisfactoriamente']);
    }

    public function destroy(Request $request)
    {
        $area = Area::findOrFail($request->id);
        //Actualizamos a Inactivo el area de Aprendizaje
        $area->estado = 0;
        $area->save();
        //Eliminamos el area de Aprendizaje
        $area->delete();

        return response()->json(['mensaje' => 'Registro Eliminado Satisfactoriamente']);
    }

    public function showdeletes()
    {
        return Area::onlyTrashed()->latest()->paginate(5);
    }

    public function restoredelete(Request $request) {

        $area = Area::onlyTrashed()->where('id',$request->id)->first();
        //Habilitamos el área
        $area->estado=1;
        $area->save();
        //Restauramos el área
        $area->restore();

        return response()->json(['mensaje' => 'Registro Restaurado Satisfactoriamente']);
    }
}
