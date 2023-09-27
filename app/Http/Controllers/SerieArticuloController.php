<?php

namespace App\Http\Controllers;

use App\Models\Serie_Articulo;
use Illuminate\Http\Request;

class SerieArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serie_Articulo = Serie_Articulo::all();

        return view('pages.tipo_articulo.index', compact('serie_Articulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tipo_articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serie_Articulo = new Serie_Articulo;
        $serie_Articulo->descripcion_serie_articulo = $request->nombre_tipo_articulo;
        $serie_Articulo->estado_serie = 1;
        $serie_Articulo->save();
        return redirect()->route('serie_articulos.index')->with('info', 'Tipo de Articulo Registrado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serie_Articulo  $serie_Articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Serie_Articulo $serie_Articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serie_Articulo  $serie_Articulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie_Articulo = Serie_Articulo::find($id);
        return view('pages.tipo_articulo.edit', compact('serie_Articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serie_Articulo  $serie_Articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serie_Articulo = Serie_Articulo::find($id);
        $serie_Articulo->descripcion_serie_articulo = $request->nombre_tipo_articulo;
        $serie_Articulo->estado_serie = 1;
        $serie_Articulo->save();
        return redirect()->route('serie_articulos.index')->with('info', 'Tipo de Articulo Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serie_Articulo  $serie_Articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie_Articulo = Serie_Articulo::find($id);
        $serie_Articulo->delete();
        return view('pages.serie_articulos.index')('info', 'Tipo de Articulo fue Eliminado Corretamente');
    }

    //Funcion para  Bloqueara al usuario
    public function block($id)
    {
        $serie_Articulo = Serie_Articulo::find($id);
        $serie_Articulo->estado_serie = 0;
        $serie_Articulo->save();
        return back()->with('info', 'Tipo de Articulo fue Bloqueado Corretamente');
    }

    public function activate($id)
    {
        $serie_Articulo = Serie_Articulo::find($id);
        $serie_Articulo->estado_serie = 1;
        $serie_Articulo->save();
        return back()->with('info', 'Tipo de Articulo fue Activado Corretamente');
    }
}