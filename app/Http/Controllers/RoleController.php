<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('Sistema.role.index');
    }


    public function listaRoles() {
        return Role::latest()->paginate(5);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name|max:191|string',
            'slug' => 'required|string|max:191|unique:roles,slug',
        ]);

        Role::create([
            'name'          => $request->name,
            'slug'          => $request->slug,
            'description'   => $request->description,
            'special'       => $request->special
        ]);

        return response()->json(['mensaje' => 'Rol registrado Satisfactoriamente']);
    }

    public function show(Request $request)
    {
        return Role::select('id','name','slug','description','special')
                    ->where('id',$request->id)->first();
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191|string',
            'slug' => 'required|string|max:191',
        ]);

        $role = Role::findOrFail($request->id);

        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->description = $request->description;
        $role->special = $request->special;
        $role->save();

        return response()->json(['mensaje' => 'Rol modificado Satisfactoriamente']);
    }

    public function destroy(Request $request)
    {
        $role = Role::where('id',$request->id)->first();
        $role->delete();

        return response()->json(['mensaje' => 'Rol Eliminado Satisfactoriamente']);
    }

    public function buscar(Request $request)
    {
        return Role::where('name','like','%'.$request->busqueda.'%')->paginate(5);
    }

    public function filtro()
    {
        return Role::select('id','name')->orderBy('id','asc')->get();
    }
}
