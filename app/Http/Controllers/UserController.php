<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('persona')->get();
        return view('pages.usuarios.index', compact('users'));
    }

    public function create()
    {
        return view('pages.usuarios.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'identificacion'    => 'required|max:25|min:3',
            'nombre'    => 'required|string|max:25|min:3',
            'apellido'  => 'required|string|max:25|min:3',
            'telefono'  => 'required|max:25|min:3',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|max:25|min:8',
            'username'  => 'required|string',
        ]);

        $persona = new Persona;
        $persona = $this->persona($request, $persona);
        DB::beginTransaction();
        try {

            $persona->save();

            $usuario = User::where('email', $request->email)->first();

            if (!$usuario) {

                $user = new User;
                $user = $this->user($request, $user, $persona);
                $user->save();
            } else {
                return response()->json(0);
            }

            DB::commit();

            return redirect()->route('usuarios.index')->with('info', 'Usuario Registrado Exitosamente');
        } catch (\Exception $ex) {
            return redirect()->route('usuarios.index')->with('info', $ex->getMessage());
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

    // Funcion para agregar al Usuario
    public function user($request, $user, $persona)
    {
        $user->username = $request->username;
        $user->email       = $request->email;
        $user->persona_id  = $persona->id;
        $user->password    = Hash::make($request->password);

        return $user;
    }


    public function show($id)
    {
        $users = User::find($id);
        return view('pages.usuarios.show', compact('users'));
    }


    public function edit($id)
    {
        $users = User::find($id);
        return view('pages.usuarios.edit', compact('users'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'identificacion'    => 'required|max:25|min:3',
            'nombre'    => 'required|string|max:25|min:3',
            'apellido'  => 'required|string|max:25|min:3',
            'telefono'  => 'required|max:25|min:3',
            'email'     => 'required|email',
            'password'  => 'required|string',
            'username'  => 'required|string',
        ]);

        $persona = $this->update_persona($request);
        DB::beginTransaction();
        try {

            $persona->save();

            DB::commit();

            return redirect()->route('usuarios.index')->with('info', 'Usuario Actualizado Exitosamente');
        } catch (\Exception $ex) {
            return redirect()->route('usuarios.index')->with('info', $ex->getMessage());
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

    // Funcion para agregar al Usuario
    public function update_user($request, $user, $persona)
    {
        //consultar el usuario que pertenece a la persona del update
        $us = User::where('persona_id', $persona->id);
        //consulta  del usuario para el update
        $user = User::findorFail($us);
        if ($request->email) {
            $user->username = $request->username;
            $user->email       = $request->email;
            $user->password    = Hash::make($request->password);
            return $user;
        }
    }

    public function destroy($id)
    {
        $user = User::find($id); // funsion buscar
        $user->delete();
        return back()->with('info', 'El Usuario fue Eliminado Corretamente');
    }
}