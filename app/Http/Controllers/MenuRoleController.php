<?php

namespace App\Http\Controllers;

use App\Menu;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class MenuRoleController extends Controller
{
    public function index()
    {
        return view('Sistema.menu_role.index');
    }

    public function ListarMenus()
    {
        return $padres = Menu::with('menus')->where('padre_id',0)
                            ->where('estado',1)
                            ->select('id','nombre','ruta','icono','padre_id','orden')
                        ->orderBy('orden','ASC')->get();
    }
    public function ListarMenuRoles(Request $request)
    {
        return Role::with('menus')->where('roles.id',$request->id)->get();
    }

    public function Guardar(Request $request)
    {
        $role = Role::where('id',$request->role_id)->first();

        $role->menus()->sync($request->menu_id);

        return response()->json(['mensaje' => 'Menús asignados al Rol, Satisfactoriamente']);
    }
}
