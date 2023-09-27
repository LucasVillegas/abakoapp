<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Departamentos;
use App\Models\Municipios;
use Illuminate\Http\Request;
use App\Models\Persona;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::with([
            'persona' => function ($query) {
                $query->select('*');
            },
        ])->get();
        return view('pages.cliente.index', compact('clientes'));
    }

    public function create()
    {
        $departamentos = Departamentos::all();
        $municipios = Municipios::all()/* with('departamento')->where("departamento_id", 5)->get()*/;
        return view('pages.cliente.create', compact('departamentos', 'municipios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'identificacion'    => 'required|max:25|min:3',
            'nombre'    => 'required|string|max:25|min:3',
            'apellido'  => 'required|string|max:25|min:3',
            'telefono'  => 'required|max:25|min:3',
            'direccion'  => 'required|max:25|min:3',
            'departamento' => 'required',
            'municipio' => 'required',
        ]);

        $persona = new Persona;
        $persona = $this->persona($request, $persona);
        DB::beginTransaction();
        try {

            $persona->save();

            if ($persona) {
                $cliente = new Cliente;
                $cliente->persona_id  = $persona->id;
                $cliente->departamento = $request->departamento;
                $cliente->municipio = $request->municipio;
                $cliente->save();
            }

            DB::commit();

            return redirect()->route('clientes.index')->with('info', 'Cliente Registrado Exitosamente');
        } catch (\Exception $ex) {
            //return response()->json(['warning' => $ex->getMessage()]);
            return redirect()->route('clientes.index')->with('info', $ex->getMessage());
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

    public function show(Cliente $cliente)
    {
        $clientes = Cliente::find($cliente->id);
        return view('pages.cliente.show', compact('clientes'));
    }

    public function edit(Cliente $cliente)
    {
        $departamentos = Departamentos::all();
        $municipios = Municipios::all();
        $clientes = Cliente::find($cliente->id);
        return view('pages.cliente.edit', compact('clientes', 'departamentos', 'municipios'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'identificacion'    => 'required|max:25|min:3',
            'nombre'    => 'required|string|max:25|min:3',
            'apellido'  => 'required|string|max:25|min:3',
            'telefono'  => 'required|max:25|min:3',
            'direccion'  => 'required|max:25|min:3',
            'departamento' => 'required',
            'municipio' => 'required',
        ]);

        $persona = $this->update_persona($request);
        DB::beginTransaction();
        try {

            $persona->save();

            if ($persona) {
                //consultar el cliente que pertenece a la persona del update
                $cliente = Cliente::findorFail($request->idc);
                $cliente->departamento = $request->departamento;
                $cliente->municipio = $request->municipio;
                $cliente->save();
            }

            DB::commit();

            return redirect()->route('clientes.index')->with('info', 'Cliente Actualizado Exitosamente');
        } catch (\Exception $ex) {
            return redirect()->route('clientes.index')->with('info', $ex->getMessage());
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
        $cliente = Persona::find($id); // funsion buscar
        $cliente->delete();
        return back()->with('info', 'El Cliente fue Eliminado Corretamente');
    }

    //Funcion para  Bloqueara
    public function block($id)
    {
        $cliente = Persona::find($id);
        $cliente->estado_persona = 0;
        $cliente->save();
        return back()->with('info', 'El Trabajador fue Bloqueado Corretamente');
    }

    public function activate($id)
    {
        $cliente = Persona::find($id);
        $cliente->estado_persona = 1;
        $cliente->save();
        return back()->with('info', 'El Trabajador fue Activado Corretamente');
    }

    public function filtro($id)
    {
        /* $municipios = DB::table('municipios')
            ->join('departamentos', 'departamentos.id', '=', 'municipios.departamento_id')
            ->where("departamento_id", "=", $request->departamento)
            ->get(); */
        $municipios = Municipios::with('departamento')->where("departamento_id", $id)->get();
        return  response()->json($municipios);
    }
}