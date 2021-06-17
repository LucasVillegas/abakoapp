<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Conductor;
use Illuminate\Http\Request;
use App\Models\Persona;

class ConductorController extends Controller
{

    public function index()
    {
        $conductores = Conductor::with([
            'persona' => function ($query) {
                $query->select('*');
            },
        ])->get();
        return view('pages.conductor.index', compact('conductores'));
    }

    public function create()
    {
        return view('pages.conductor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'identificacion'    => 'required|max:25|min:3',
            'nombre'    => 'required|string|max:25|min:3',
            'apellido'  => 'required|string|max:25|min:3',
            'telefono'  => 'required|max:25|min:3',
            'direccion'  => 'required|max:25|min:3',
            'transportadora' => 'required',
        ]);

        $persona = new Persona;
        $persona = $this->persona($request, $persona);
        DB::beginTransaction();
        try {

            $persona->save();

            if ($persona) {
                $cliente = new Conductor;
                $cliente->persona_id  = $persona->id;
                $cliente->salario = NULL;
                $cliente->transportadora = $request->transportadora;
                $cliente->save();
            }

            DB::commit();

            return redirect()->route('conductores.index')->with('info', 'Conductor Registrado Exitosamente');
        } catch (\Exception $ex) {
            //return response()->json(['warning' => $ex->getMessage()]);
            return redirect()->route('conductores.index')->with('info', $ex->getMessage());
        }
    }

    // Funcion para agregar a la persona
    public function persona($request, $persona)
    {
        $persona->identificacion = $request->identificacion;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->genero = $request->genero;
        $persona->estado_persona = 1;

        return $persona;
    }

    public function show(Conductor $conductor, $id)
    {
        $conductores = Conductor::find($id);
        return view('pages.conductor.show', compact('conductores'));
    }

    public function edit($id)
    {
        $conductores = Conductor::find($id);
        return view('pages.conductor.edit', compact('conductores'));
    }

    /*  public function update(Request $request, Conductor $conductor)
    {
        //
    } */

    public function update(Request $request)
    {
        $request->validate([
            'identificacion'    => 'required|max:25|min:3',
            'nombre'    => 'required|string|max:25|min:3',
            'apellido'  => 'required|string|max:25|min:3',
            'telefono'  => 'required|max:25|min:3',
            'direccion'  => 'required|max:25|min:3',
            'transportadora' => 'required',
        ]);

        $persona = $this->update_persona($request);
        DB::beginTransaction();
        try {

            $persona->save();

            if ($persona) {
                $cliente = Conductor::findorFail($request->idc);
                //$cliente->persona_id  = $persona->id;
                $cliente->salario = NULL;
                $cliente->transportadora = $request->transportadora;
                $cliente->save();
            }

            DB::commit();

            return redirect()->route('conductores.index')->with('info', 'Conductor Actualizado Exitosamente');
        } catch (\Exception $ex) {
            return redirect()->route('conductores.index')->with('info', $ex->getMessage());
            //return response()->json(['warning' => $ex->getMessage()]);
        }
    }

    // Funcion para agregar a la persona
    public function update_persona($request)
    {
        $persona = Persona::findOrFail($request->id);
        $persona->identificacion = $request->identificacion;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->genero = $request->genero;
        $persona->estado_persona = 1;

        return $persona;
    }

    public function destroy($id)
    {
        $trabajador = Persona::find($id); // funsion buscar
        $trabajador->delete();
        return back()->with('info', 'El Trabajador fue Eliminado Corretamente');
    }

    //Funcion para  Bloqueara al usuario
    public function block($id)
    {
        $trabajador = Persona::find($id);
        $trabajador->estado_persona = 0;
        $trabajador->save();
        return back()->with('info', 'El Conductor fue Bloqueado Corretamente');
    }

    public function activate($id)
    {
        $trabajador = Persona::find($id);
        $trabajador->estado_persona = 1;
        $trabajador->save();
        return back()->with('info', 'El Conductor fue Activado Corretamente');
    }
}