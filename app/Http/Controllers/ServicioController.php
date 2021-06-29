<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Trabajador;
use App\Models\Tipo_Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{

    public function index()
    {
        /* $servicio = Servicio::with([
            'tipo_servicio' => function ($query) {
                $query->select('*');
            },
            'trabajador' => function ($query) {
                $query->select('*');
            },
        ])->get(); */

        $servicio = DB::table('servicio')
            ->join('tipo_servicio', 'servicio.tipo_servicio_id', '=', 'tipo_servicio.id')
            ->join('trabajador', 'servicio.trabajador_id', '=', 'trabajador.id')
            ->join('persona', 'trabajador.persona_id', '=', 'persona.id')
            ->select('*', 'servicio.id as servicio_id')
            ->get();

        return view('pages.servicio.index', compact('servicio'));
    }

    public function create()
    {
        $trabajador = Trabajador::with([
            'persona' => function ($query) {
                $query->select('*');
            },
        ])->get();
        $tipo_Servicio = Tipo_Servicio::all();
        return view('pages.servicio.create', compact('trabajador', 'tipo_Servicio'));
    }

    public function store(Request $request)
    {
        $servicio = new Servicio;
        $servicio->tipo_servicio_id = $request->tipo_Servicio;
        $servicio->trabajador_id = $request->trabajador;
        $servicio->descripcion_servicio = $request->nombre_servicio;
        $servicio->fecha_inicio = $request->fecha_inicio;
        $servicio->fecha_fin = $request->fecha_fin;
        $servicio->costo_supuesto = $request->costo_supuesto;
        $servicio->costo_real = $request->costo_real;
        $servicio->dif_costo = $request->diferencia_costo;
        $servicio->estado_Servicio = 1;
        $servicio->save();
        return redirect()->route('servicios.index')->with('info', 'Servicio Registrado Exitosamente');
    }

    public function show($id)
    {
        $servicio = DB::table('servicio')
            ->join('tipo_servicio', 'servicio.tipo_servicio_id', '=', 'tipo_servicio.id')
            ->join('trabajador', 'servicio.trabajador_id', '=', 'trabajador.id')
            ->join('persona', 'trabajador.persona_id', '=', 'persona.id')
            ->select('*', 'servicio.id as servicio_id')
            ->where('servicio.id', '=', $id)
            ->get();
        foreach ($servicio as $row) {
        }
        return view('pages.servicio.show', compact('row'));
    }

    public function edit($id)
    {
        $trabajador = Trabajador::with([
            'persona' => function ($query) {
                $query->select('*');
            },
        ])->get();
        $tipo_Servicio = Tipo_Servicio::all();
        $servicio = DB::table('servicio')
            ->join('tipo_servicio', 'servicio.tipo_servicio_id', '=', 'tipo_servicio.id')
            ->join('trabajador', 'servicio.trabajador_id', '=', 'trabajador.id')
            ->join('persona', 'trabajador.persona_id', '=', 'persona.id')
            ->select(
                '*',
                'servicio.id as servicio_id',
                'trabajador.id as trabajador_id',
                'tipo_servicio.id as tipo_servicio_id'
            )
            ->where('servicio.id', '=', $id)
            ->get();
        foreach ($servicio as $row) {
        }
        return view('pages.servicio.edit', compact('row', 'trabajador', 'tipo_Servicio'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->tipo_servicio_id = $request->tipo_Servicio;
        $servicio->trabajador_id = $request->trabajador;
        $servicio->descripcion_servicio = $request->nombre_servicio;
        $servicio->fecha_inicio = $request->fecha_inicio;
        $servicio->fecha_fin = $request->fecha_fin;
        $servicio->costo_supuesto = $request->costo_supuesto;
        $servicio->costo_real = $request->costo_real;
        $servicio->dif_costo = $request->diferencia_costo;
        $servicio->estado_Servicio = 1;
        $servicio->save();
        return redirect()->route('servicios.index')->with('info', 'Servicio Actualizado Exitosamente');
    }

    public function destroy(Servicio $servicio)
    {
        //
    }

    //Funcion para  Bloqueara al usuario
    public function block($id)
    {
        $trabajador = Servicio::find($id);
        $trabajador->estado_Servicio = 0;
        $trabajador->save();
        return back()->with('info', 'El Servicio fue Bloqueado Corretamente');
    }

    public function activate($id)
    {
        $trabajador = Servicio::find($id);
        $trabajador->estado_Servicio = 1;
        $trabajador->save();
        return back()->with('info', 'El Servicio fue Activado Corretamente');
    }
}