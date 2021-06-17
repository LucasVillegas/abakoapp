<?php

namespace App\Http\Controllers;

use App\Models\Tipo_Servicio;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class TipoServicioController extends Controller
{

    public function index()
    {
        $tipo_Servicio = Tipo_Servicio::all();
        return view('pages.tipo_servicio.index', compact('tipo_Servicio'));
    }

    public function create()
    {
        return view('pages.tipo_servicio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_tipo_servicio'    => 'required|max:25|min:3',
        ]);
        $tipo_Servicio = new Tipo_Servicio;
        $tipo_Servicio->nombre_tipo_servicio = $request->nombre_tipo_servicio;
        $tipo_Servicio->estado_tipo_servicio = 1;
        $tipo_Servicio->save();
        return redirect()->route('tipo_servicios.index')->with('info', 'Tipo de Servicio Registrado Exitosamente');
    }

    public function show(Tipo_Servicio $tipo_Servicio)
    {
        //$tipo_Servicio
    }

    public function edit($id)
    {
        $tipo_Servicio = Tipo_Servicio::find($id);
        return view('pages.tipo_servicio.edit', compact('tipo_Servicio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_tipo_servicio'    => 'required|max:25|min:3',
        ]);
        $tipo_Servicio = Tipo_Servicio::find($id);
        $tipo_Servicio->nombre_tipo_servicio = $request->nombre_tipo_servicio;
        $tipo_Servicio->estado_tipo_servicio = 1;
        $tipo_Servicio->save();
        return redirect()->route('tipo_servicios.index')->with('info', 'Tipo de Servicio Actualizado Exitosamente');
    }

    public function destroy($id)
    {
        $tipo_Servicio = Tipo_Servicio::find($id); // funsion buscar
        $tipo_Servicio->delete();
        return view('pages.tipo_servicio.index')('info', 'Tipo de Servicio fue Eliminado Corretamente');
    }

    //Funcion para  Bloqueara al usuario
    public function block($id)
    {
        $tipo_Servicio = Tipo_Servicio::find($id);
        $tipo_Servicio->estado_tipo_servicio = 0;
        $tipo_Servicio->save();
        return back()->with('info', 'Tipo de Servicio fue Bloqueado Corretamente');
    }

    public function activate($id)
    {
        $tipo_Servicio = Tipo_Servicio::find($id);
        $tipo_Servicio->estado_tipo_servicio = 1;
        $tipo_Servicio->save();
        return back()->with('info', 'Tipo de Servicio fue Activado Corretamente');
    }

}