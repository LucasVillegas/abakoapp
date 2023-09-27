@extends('layouts.app', ['activePage' => 'componente', 'titlePage' => __('Tablero de Componentes')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (Session::has('info'))
                {{-- Alerta --}}
                <div class="alert alert-success alerta">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span><b> Exito - </b> {{ Session::get('info') }}</span>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('componentes.create') }}" class="btn btn-success pull-right"><span
                            class="material-icons">
                            add_circle_outline
                        </span> Nuevo Componente <div class="ripple-container">
                        </div>
                    </a>
                </div>
                @foreach ($componente as $item)
                    {{-- $hola=""; --}}
                    {{ $hola = $item->descripcion }}
                @endforeach
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6 cards">
                            <div class="card card-pricing card-raised">
                                <div class="card-body text-center">
                                    <h6 class="card-category">{{-- {{ $hola }} --}}</h6>
                                    <div class="card-icon icon-rose">
                                        <i class="material-icons">inventory_2</i>

                                    </div>
                                    <h3 class="card-title">$29</h3>
                                    <p class="card-description">
                                        {{ $item->descripcion_componente }}
                                    </p>
                                    <a href="#pablo" class="btn btn-rose btn-round">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    {{-- <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">Tabla Componentes</h4>
                            <p class="card-category"> Listado de Componentes del sistema</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive my-3">
                                <table class="table table-sm text-center">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Articulo</th>
                                            <th>Descripción</th>
                                            <th>Codigo</th>
                                            <th>Referencia</th>
                                            <th>Unidad</th>
                                            <th>Medida</th>
                                            <th>Ultimo Costo</th>
                                            <th>Costo Total</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articulo as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->serie_artiulo->descripcion_serie_articulo }}</td>
                                                <td>{{ $item->codarticulo }}</td>
                                                <td>{{ $item->descripcion }}</td>
                                                <td>{{ $item->referencia }}</td>
                                                <td>{{ $item->medida }}</td>
                                                <td>{{ number_format($item->costo) }}</td>
                                                <td>{{ number_format($item->precio_venta) }}</td>
                                                <td>{{ number_format($item->precio_minino) }}</td>
                                                <td>{{ number_format($item->ultimo_coste) }}</td>

                                                <td>
                                                    @if ($item->estado_articulo == 1)
                                                        <span class='badge badge-success'>Activo</span>
                                                    @else
                                                        <span class='badge badge-danger'>Inactivo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->estado_articulo == 1)
                                                        <div class='btn-group' role='group'>

                                                            <a href="{{ route('articulos.edit', $item->id) }}"
                                                                class="text-warning btn-sm"
                                                                style='outline: none;box-shadow: none'>
                                                                <i class="fa fa-edit"></i> Editar
                                                            </a>

                                                            <a href="{{ route('articulos.block', $item->id) }}"
                                                                class='text-dark btn-sm'
                                                                style='outline: none;box-shadow: none'><i
                                                                    class='fa fa-ban'></i>
                                                                Bloquear</a>

                                                            <a href="{{ route('articulos.destroy', $item->id) }}"
                                                                class='text-danger btn-sm'
                                                                style='outline: none;box-shadow: none'>
                                                                <input type="hidden" id="id" name="id"
                                                                    value="{{ $item->id }}">
                                                                <i class='fa fa-trash'></i> Eliminar</a>
                                                        </div>
                                                    @else
                                                        <a href="{{ route('articulos.activate', $item->id) }}"
                                                            class='text-success btn-sm'
                                                            style='outline: none;box-shadow: none'><i
                                                                class='fa fa-undo'></i>
                                                            Activar</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
