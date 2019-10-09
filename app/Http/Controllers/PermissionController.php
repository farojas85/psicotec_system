<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function index()
    {
        return view('Sistema.permission.index');
    }

    public function lista()
    {
        return Permission::latest()->paginate(5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:191',
            'slug'  => 'required|string|max:191|unique:permissions,slug'
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->slug = $request->slug;
        $permission->description = $request->description;
        $permission->save();

        return response()->json(['mensaje' => 'Permiso Registrado Satisfactoriamente']);

    }

    public function show(Request $request)
    {
        return Permission::where('id',$request->id)
                            ->select('id','name','slug','description')
                            ->first();

    }


    public function edit(Permission $permission)
    {
        //
    }

     public function update(Request $request, Permission $permission)
    {
        //
    }


    public function destroy(Permission $permission)
    {
        //
    }

    public function filtro()
    {
        return Permission::select('id','name','slug','description')->orderBy('id','asc')->get();
    }
}
