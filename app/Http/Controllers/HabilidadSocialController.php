<?php

namespace App\Http\Controllers;

use App\HabilidadSocial;
use Illuminate\Http\Request;

class HabilidadSocialController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:habilidadsocial.create')->only(['create','store']);
        $this->middleware('permission:habilidadsocial.index')->only('index');
        $this->middleware('permission:habilidadsocial.edit')->only(['edit','update']);
        $this->middleware('permission:habilidadsocial.show')->only('show');
        $this->middleware('permission:habilidadsocial.destroy')->only('destroy');
        $this->middleware('permission:habilidadsocial.showdeletes')->only('showdeletes');
        $this->middleware('permission:habilidadsocial.restoredelete')->only('restoredelete');
    }
    public function index()
    {
        //
    }

    public function lista() {
        return HabilidadSocial::latest()->paginate(5);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:191|unique:menus'
        ]);

        $habilidad = HabilidadSocial::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);

        return response()->json(['mensaje' => 'Registro Añadido Satisfactoriamente']);
    }

    public function show(Request $request)
    {
        return HabilidadSocial::findOrFail($request->id);
    }

    public function edit(HabilidadSocial $habilidadSocial)
    {
        //
    }

    public function update(Request $request)
    {
        $habilidad = HabilidadSocial::findOrFail($request->id);

        $habilidad->nombre = $request->nombre;
        $habilidad->descripcion = $request->descripcion;
        $habilidad->estado = $request->estado;
        $habilidad->save();

        return response()->json(['mensaje' => 'Registro Modificado Satisfactoriamente']);
    }

    public function destroy(Request $request)
    {
        $habilidad = HabilidadSocial::findOrFail($request->id);
        $habilidad->estado=0;
        $habilidad->save();

        $habilidad->delete();

        return response()->json(['mensaje' => 'Registro Eliminado Satisfactoriamente']);
    }

    public function showdeletes()
    {
        return HabilidadSocial::onlyTrashed()->latest()->paginate(5);
    }

    public function restoredelete(Request $request) {
        $habilidad = HabilidadSocial::onlyTrashed()->where('id',$request->id)->first();
        $habilidad->estado=1;
        $habilidad->save();
        
        $habilidad->restore();

        return response()->json(['mensaje' => 'Registro Restaurado Satisfactoriamente']);
    }
}
