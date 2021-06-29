<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$componente = Componente::with('articulo')->groupBy('descripcion')->get();
        // $users = DB::table('componente');
        $componente = DB::table('componente')->join('articulo', 'componente.articulo_id', '=', 'articulo.id')
            ->select('*')/* ->groupBy('descripcion') */->get();
        return view('pages.componente.index', compact('componente'));
        //return response()->json($componente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulo = Articulo::all();
        return view('pages.componente.create', compact('articulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo_componente'    => 'required',
            'descripcion_componente'    => 'required',
            'referencia_componente'  => 'required',
            'unidad_componente'  => 'required',
            'medida_componente'  => 'required',
            'ultimo_coste' => 'required',
            'costo_total' => 'required',
        ]);

        foreach ($request->codigo_componente as $key => $articulo) {
            $componente = new Componente();
            $componente->articulo_id = $request->articulo;
            $componente->descripcion_componente = $request->descripcion_componente[$key];
            $componente->codigo_componente =  $articulo/* $request->codigo_componente[$key] */;
            $componente->referencia = $request->referencia_componente[$key];
            $componente->unidad = $request->unidad_componente[$key];
            $componente->medida = $request->medida_componente[$key];
            $componente->ultimo_coste = $request->ultimo_coste[$key];
            $componente->costo_total = $request->costo_total[$key]; 
            $componente->estado_componente = 1;
            $componente->save();
        }
        return redirect()->route('componentes.index')->with('info', 'Componentes Registrados Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function show(Componente $componente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function edit(Componente $componente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Componente $componente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Componente $componente)
    {
        //
    }
}