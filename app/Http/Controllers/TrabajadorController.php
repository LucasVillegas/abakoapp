<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Trabajador;
use Illuminate\Http\Request;
use App\Models\Persona;

class TrabajadorController extends Controller
{

    public function index()
    {
        $trabajador = Trabajador::with([
            'persona' => function ($query) {
                $query->select('*');
            },
        ])->get();
        return view('pages.trabajador.index', compact('trabajador'));
    }


    public function create()
    {
        return view('pages.trabajador.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'identificacion'    => 'required|max:25|min:3',
            'nombre'    => 'required|string|max:25|min:3',
            'apellido'  => 'required|string|max:25|min:3',
            'telefono'  => 'required|max:25|min:3',
            'direccion'  => 'required|max:25|min:3',
        ]);

        $persona = new Persona;
        $persona = $this->persona($request, $persona);
        DB::beginTransaction();
        try {

            $persona->save();

            if ($persona) {
                $trabajador = new Trabajador;
                $trabajador->persona_id  = $persona->id;
                $trabajador->salario = NULL;
                $trabajador->save();
            }

            DB::commit();

            return redirect()->route('trabajadores.index')->with('info', 'Trabajador Registrado Exitosamente');
        } catch (\Exception $ex) {
            //return response()->json(['warning' => $ex->getMessage()]);
            return redirect()->route('trabajadores.index')->with('info', $ex->getMessage());
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

    public function show($id)
    {
        $trabajador = Trabajador::find($id);
        return view('pages.trabajador.show', compact('trabajador'));
        //return response()->json(['warning' => $trabajadores]);
    }

    public function edit($id)
    {
        $trabajador = Trabajador::find($id);
        return view('pages.trabajador.edit', compact('trabajador'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'identificacion'    => 'required|max:25|min:3',
            'nombre'    => 'required|string|max:25|min:3',
            'apellido'  => 'required|string|max:25|min:3',
            'telefono'  => 'required|max:25|min:3',
            'direccion'  => 'required|max:25|min:3',
        ]);

        $persona = $this->update_persona($request);
        DB::beginTransaction();
        try {

            $persona->save();

            /* if ($persona) {
                $trabajador = Trabajador::findorFail($request->idc);
                $trabajador->persona_id  = $persona->id;
                $trabajador->salario = NULL;
                $trabajador->save();
            } */

            DB::commit();

            return redirect()->route('trabajadores.index')->with('info', 'Trabajador Actualizado Exitosamente');
        } catch (\Exception $ex) {
            return redirect()->route('trabajadores.index')->with('info', $ex->getMessage());
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
        return back()->with('info', 'El Trabajador fue Bloqueado Corretamente');
    }

    public function activate($id)
    {
        $trabajador = Persona::find($id);
        $trabajador->estado_persona = 1;
        $trabajador->save();
        return back()->with('info', 'El Trabajador fue Activado Corretamente');
    }
}