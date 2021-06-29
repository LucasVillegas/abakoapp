<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Serie_Articulo;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulo = Articulo::with('serie_artiulo')->get();
        $componente = DB::table('componente')->join('articulo', 'componente.articulo_id', '=', 'articulo.id')
            ->select('*', 'componente.id as componente_id')/* ->groupBy('descripcion') */->get();
        return view('pages.articulo.index', compact('articulo', 'componente'));

        //return response()->json($articulo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serie_Articulo = Serie_Articulo::all();
        return view('pages.articulo.create', compact('serie_Articulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulo = new Articulo;
        $articulo->serie_articulo_id = $request->tipo_articulo;
        $articulo->codarticulo = $request->codigo_articulo;
        $articulo->descripcion = $request->descripcion_articulo;
        $articulo->referencia = $request->referencia_articulo;
        $articulo->medida = $request->medida_articulo;
        $articulo->costo = $request->costo_articulo;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->precio_minino = $request->precio_minimo;
        $articulo->ultimo_coste = $request->precio_ultimo;
        $articulo->estado_articulo = 1;
        $articulo->save();
        return redirect()->route('articulos.index')->with('info', 'Articulo Registrado Exitosamente');
    }

    /**
     * Display the specified resource.
     *articulo
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::with([
            'servicio' => function ($query) {
                $query->select('*'); # Muchos a muchos
            },
            'serie_artiulo' => function ($query) {
                $query->select('*'); # Uno a muchos
            },
        ])->find($id)->get();
        return view('pages.articulo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie_Articulo = Serie_Articulo::all();
        $articulo = Articulo::with('serie_artiulo')->find($id);
        foreach ($articulo as $row) {
        }
        return view('pages.articulo.edit', compact('articulo', 'serie_Articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);
        $articulo->serie_articulo_id = $request->tipo_articulo;
        $articulo->codarticulo = $request->codigo_articulo;
        $articulo->descripcion = $request->descripcion_articulo;
        $articulo->referencia = $request->referencia_articulo;
        $articulo->medida = $request->medida_articulo;
        $articulo->costo = $request->costo_articulo;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->precio_minino = $request->precio_minimo;
        $articulo->ultimo_coste = $request->precio_ultimo;
        $articulo->estado_articulo = 1;
        $articulo->save();
        return redirect()->route('articulos.index')->with('info', 'Articulo Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return back()->with('info', 'El Articulo fue Eliminado Corretamente');
    }

    //Funcion para  Bloqueara al usuario
    public function block($id)
    {
        $articulo = Articulo::find($id);
        $articulo->estado_articulo = 0;
        $articulo->save();
        return back()->with('info', 'El Articulo fue Bloqueado Corretamente');
    }

    public function activate($id)
    {
        $articulo = Articulo::find($id);
        $articulo->estado_articulo = 1;
        $articulo->save();
        return back()->with('info', 'El Articulo fue Activado Corretamente');
    }
}