<?php

namespace App\Http\Controllers;

use App\Ocupacion;
use Illuminate\Http\Request;

class OcupacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ocupacion.create')->only(['create','store']);
        $this->middleware('permission:ocupacion.index')->only('index');
        $this->middleware('permission:ocupacion.edit')->only(['edit','update']);
        $this->middleware('permission:ocupacion.show')->only('show');
        $this->middleware('permission:ocupacion.destroy')->only('destroy');
        $this->middleware('permission:ocupacion.showdeletes')->only('showdeletes');
        $this->middleware('permission:ocupacion.showactives')->only('showactives');
        $this->middleware('permission:ocupacion.restoredelete')->only('restoredelete');
    }

    public function index()
    {
        //
    }

    public function lista() 
    {
        return Ocupacion::with(['area','personalidad'])->latest()->paginate(5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:191',
            'area_id' => 'required',
            'personalidad_id' => 'required'
        ]);

        $ocupacion = Ocupacion::create([
            'nombre' => $request->nombre,
            'area_id' => $request->area_id,
            'personalidad_id' => $request->personalidad_id
        ]);

        return response()->json(['mensaje' => 'Registro Insertado Satisfactoriamente']);
    }

    public function show(Request $request)
    {
        return Ocupacion::findOrFail($request->id);
    }

    public function update(Request $request)
    {
        $ocupacion = Ocupacion::findOrFail($request->id);

        $ocupacion->nombre = $request->nombre;
        $ocupacion->area_id = $request->area_id;
        $ocupacion->personalidad_id = $request->personalidad_id;
        $ocupacion->estado = $request->estado;
        $ocupacion->save();

        return response()->json(['mensaje' => 'Registro Modificado Satisfactoriamente']);
    }

    public function destroy(Request $request)
    {
        $ocupacion = Ocupacion::findOrFail($request->id);

        $ocupacion->delete();

        return response()->json(['mensaje' => 'Registro Eliminado Satisfactoriamente']);
    }

    public function showactives() 
    {
        return Ocupacion::with(['area','personalidad'])->latest()->paginate(5);
    }

    public function showdeletes() 
    {
        return Ocupacion::with(['area','personalidad'])->onlyTrashed()->latest()->paginate(5);
    }

    public function restoredelete(Request $request) 
    {
        $ocupacion = Ocupacion::onlyTrashed()->where('id',$request->id)->first();

        $ocupacion->restore();

        return response()->json(['mensaje' => 'Registro Restaurado Satisfactoriamente']);
    }

    public function filtro() {
        return Ocupacion::where('estado',1)->select('id','nombre')->orderBy('id','ASC')->get();
    }
}
