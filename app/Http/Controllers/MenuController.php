<?php

namespace App\Http\Controllers;

use App\Menu;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        return view('Sistema.menu.index');
    }

    public function listaMenu()
    {
        return Menu::with('padre')->latest()->paginate(5);
    }

    public function listaPadres() 
    {
        return Menu::where('padre_id',0)
                    ->where('estado',1)
                    ->select('id','nombre')
                    ->get();
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:191|unique:menus'
        ]);

        //Guardamos el Menú
        $menu = new Menu();
        $menu->nombre = $request->nombre;
        $menu->ruta = $request->ruta;
        $menu->icono = $request->icono;
        $menu->padre_id = ($request->padre_id == '') ? 0 : $request->padre_id;
        $menu->estado = $request->estado;
        //Obtenemos el Orden del Menú
        $menu->orden =  ($menu->padre_id == 0) ? Menu::maximoPadreId() : Menu::maximoHijoId($menu->padre_id);
        $menu->save();
        
        return response()->json(['mensaje' => 'Menu Agregado Satisfactoriamente']);
    }

    public function show(Request $request)
    {
        return Menu::with('padre')->where('id',$request->id)->first();
    }

    public function update(Request $request)
    {
        $menu = Menu::findOrFail($request->id);

        $menu->nombre = $request->nombre;
        $menu->ruta = $request->ruta;
        $menu->icono = $request->icono;
        $menu->estado = $request->estado;
        if($menu->padre_id  != $request->padre_id)
        {
            $menu->orden =  ($request->padre_id == '') ? Menu::maximoPadreId() : Menu::maximoHijoId($request->padre_id);
        }
        $menu->padre_id = ($request->padre_id == '') ? 0 : $request->padre_id;
        $menu->save();

        return response()->json(['mensaje' => 'Datos de Menú modificado Satisfactoriamente']);
    }

    public function destroy(Request $request)
    {
        $menu = Menu::where('id',$request->id)->first();

        $menu->delete();

        return response()->json(['mensaje' => 'Menú Eliminado Satisfactoriamente']);
    }
}
