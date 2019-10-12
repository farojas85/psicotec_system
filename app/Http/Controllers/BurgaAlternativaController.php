<?php

namespace App\Http\Controllers;

use App\BurgaAlternativa;
use Illuminate\Http\Request;

class BurgaAlternativaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:burga-alternativa.create')->only(['create','store']);
        $this->middleware('permission:burga-alternativa.index')->only('index');
        $this->middleware('permission:burga-alternativa.edit')->only(['edit','update']);
        $this->middleware('permission:burga-alternativa.show')->only('show');
        $this->middleware('permission:burga-alternativa.destroy')->only('destroy');
        $this->middleware('permission:burga-alternativa.show-deletes')->only('showdeletes');
        $this->middleware('permission:burga-alternativa.show-actives')->only('showactives');
        $this->middleware('permission:burga-alternativa.restore-delete')->only('restoredelete');
    }

    public function index()
    {
        //
    }

    public function lista() 
    {
        //return BurgaAlternativa::get();
        return BurgaAlternativa::latest()->paginate(5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:191'
        ]);

        $alternativa = BurgaAlternativa::create([
            'nombre' => $request->nombre
        ]);

        return response()->json(['mensaje' => 'Registro Insertado Satisfactoriamente']);
    }

    public function show(Request $request)
    {
        return BurgaAlternativa::findOrFail($request->id);
    }

    public function update(Request $request)
    {
        $alternativa = BurgaAlternativa::findOrFail($request->id);

        $alternativa->nombre = $request->nombre;
        $alternativa->save();

        return response()->json(['mensaje' => 'Registro Modificado Satisfactoriamente']);
    }

    public function destroy(Request $request)
    {
        $alternativa = BurgaAlternativa::findOrFail($request->id);

        $alternativa->delete();

        return response()->json(['mensaje' => 'Registro Eliminado Satisfactoriamente']);
    }

    public function showactives() 
    {
        return BurgaAlternativa::latest()->paginate(5);
    }

    public function showdeletes() 
    {
        return BurgaAlternativa::onlyTrashed()->latest()->paginate(5);
    }

    public function restoredelete(Request $request) 
    {
        $alternativa = BurgaAlternativa::onlyTrashed()->where('id',$request->id)->first();

        $alternativa->restore();

        return response()->json(['mensaje' => 'Registro Restaurado Satisfactoriamente']);
    }

    public function filtro() {
        return BurgaAlternativa::where('estado',1)->select('id','nombre')->orderBy('id','ASC')->get();
    }
}
