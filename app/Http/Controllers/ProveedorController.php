<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Models\Persona;

class ProveedorController extends Controller
{

    public function index()
    {
        return view('pages.proveedor.index');
    }

    public function create()
    {
        return view('pages.proveedor.create');
    }

    public function store(Request $request)
    {
        /*  $request->validate([
            'identificacion'    => 'required|max:25|min:3',
            'nombre'    => 'required|string|max:25|min:3',
            'apellido'  => 'required|string|max:25|min:3',
            'telefono'  => 'required|max:25|min:3',
            'email'     => 'required|email|unique:users,email',
            'nit'  => 'required|max:25|min:3',
            'rut'  => 'required|max:25|min:3',
            'organizacion'  => 'required|max:25|min:3',
        ]); */

        $persona = new Persona;
        $persona = $this->persona($request, $persona);
        DB::beginTransaction();
        try {
            if (
                $request->identificacion == "" && $request->nombre == "" &&
                $request->apellido == "" && $request->telefono == "" && $request->direccion == "" && $request->genero == ""
            ) {
                $proveedor = new Proveedor;
                $proveedor = $this->persona_juridica($request, $proveedor, $persona);
                $proveedor->save();
            } else {

                $persona->save();

                //if ($persona) {}

                $proveedor = new Proveedor;
                $proveedor = $this->persona_juridica($request, $proveedor, $persona);
                $proveedor->save();
            }

            DB::commit();

            return redirect()->route('proveedores.index')->with('info', 'Proveedor Registrado Exitosamente');
        } catch (\Exception $ex) {
            return redirect()->route('proveedores.index')->with('info', $ex->getMessage());
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

    public function persona_juridica($request, $proveedor, $persona)
    {
        $proveedor->persona_id = $persona->id;
        $proveedor->nit = $request->nit;
        $proveedor->rut = $request->rut;
        $proveedor->organizacion = $request->id;
        $proveedor->correo = $request->id;
        return $proveedor;
    }

    public function show(Proveedor $proveedor)
    {
        
    }

    public function edit(Proveedor $proveedor)
    {
        //
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    public function destroy(Proveedor $proveedor)
    {
        //
    }
}