<?php

namespace App\Http\Controllers;

use App\BurgaAfirmacion;
use Illuminate\Http\Request;

class BurgaAfirmacionController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('permission:burga-afirmacion.create')->only(['create','store']);
        $this->middleware('permission:burga-afirmacion.index')->only('index');
        $this->middleware('permission:burga-afirmacion.edit')->only(['edit','update']);
        $this->middleware('permission:burga-afirmacion.show')->only('show');
        $this->middleware('permission:burga-afirmacion.destroy')->only('destroy');
        $this->middleware('permission:burga-afirmacion.show-deletes')->only('showdeletes');
        $this->middleware('permission:burga-afirmacion.show-actives')->only('showactives');
        $this->middleware('permission:burga-afirmacion.restore-delete')->only('restoredelete');
    }

    public function index()
    {
        //
    }

    public function lista() 
    {
        return BurgaAfirmacion::latest()->paginate(5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:191'
        ]);

        $alternativa = BurgaAfirmacion::create([
            'nombre' => $request->nombre
        ]);

        return response()->json(['mensaje' => 'Registro Insertado Satisfactoriamente']);
    }

    public function show(Request $request)
    {
        return BurgaAfirmacion::findOrFail($request->id);
    }

    public function update(Request $request)
    {
        $afirmacion = BurgaAfirmacion::findOrFail($request->id);

        $afirmacion->nombre = $request->nombre;
        $afirmacion->save();

        return response()->json(['mensaje' => 'Registro Modificado Satisfactoriamente']);
    }

    public function destroy(Request $request)
    {
        $afirmacion = BurgaAfirmacion::findOrFail($request->id);

        $afirmacion->delete();

        return response()->json(['mensaje' => 'Registro Eliminado Satisfactoriamente']);
    }

    public function showactives() 
    {
        return BurgaAfirmacion::latest()->paginate(5);
    }

    public function showdeletes() 
    {
        return BurgaAfirmacion::onlyTrashed()->latest()->paginate(5);
    }

    public function restoredelete(Request $request) 
    {
        $afirmacion = BurgaAfirmacion::onlyTrashed()->where('id',$request->id)->first();

        $afirmacion->restore();

        return response()->json(['mensaje' => 'Registro Restaurado Satisfactoriamente']);
    }

    public function filtro() {
        return BurgaAfirmacion::where('estado',1)->select('id','nombre')->orderBy('id','ASC')->get();
    }
}
