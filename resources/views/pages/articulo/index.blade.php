@extends('layouts.app', ['activePage' => 'articulo', 'titlePage' => __('Tablero de Articulos y Componentes')])

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

                {{-- <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">Tabla Articulos</h4>
                            <p class="card-category"> Listado de Articulos del sistema</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive my-3">
                                <table class="table table-sm text-center">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>T.Articulo</th>
                                            <th>Codigo</th>
                                            <th>Descripcion</th>
                                            <th>Referencia</th>
                                            <th>Medida</th>
                                            <th>Costo</th>
                                            <th>P.Venta</th>
                                            <th>P.Minimo</th>
                                            <th>Ultimo Precio</th>
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
                    </div>
                </div> --}}
            </div>
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title ">Tabla Articulos y Componentes</h4>
                        <p class="card-category"> Listado de Articulos y Componentes del sistema</p>
                    </div>
                    <div class="card-body ">
                        <ul class="nav nav-pills nav-pills-danger" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#articulos" role="tablist">
                                    Articulos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#componentes" role="tablist">
                                    Componentes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                                    Options
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content tab-space">
                            <div class="tab-pane active show" id="articulos">
                                <div class="col-md-12 mt-3 text-center">
                                    <a href="{{ route('articulos.create') }}" class="btn btn-success pull-center"><span
                                            class="material-icons">
                                            add_circle_outline
                                        </span> Nuevo Articulo <div class="ripple-container">
                                        </div>
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm text-center" id="datatable">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>T.Articulo</th>
                                                <th>Codigo</th>
                                                <th>Descripcion</th>
                                                <th>Referencia</th>
                                                <th>Medida</th>
                                                <th>Costo</th>
                                                <th>P.Venta</th>
                                                <th>P.Minimo</th>
                                                <th>Ultimo Precio</th>
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
                            <div class="tab-pane " id="componentes">
                                <div class="col-md-12 mt-3 text-center">
                                    <a href="{{ route('componentes.create') }}" class="btn btn-success pull-center"><span
                                            class="material-icons">
                                            add_circle_outline
                                        </span> Nuevo Componente <div class="ripple-container">
                                        </div>
                                    </a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm text-center" id="datatable">
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
                                                {{-- <th>Acciones</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($componente as $componente)
                                                <tr>
                                                    <td>{{ $componente->componente_id }}</td>
                                                    <td>{{ $componente->descripcion }}</td>
                                                    <td>{{ $componente->descripcion_componente }}</td>
                                                    <td>{{ $componente->codigo_componente }}</td>
                                                    <td>{{ $componente->referencia }}</td>
                                                    <td>{{ $componente->unidad }}</td>
                                                    <td>{{ $componente->medida }}</td>
                                                    <td>{{ number_format($componente->ultimo_coste) }}</td>
                                                    <td>{{ number_format($componente->costo_total) }}</td>

                                                    <td>
                                                        @if ($componente->estado_componente == 1)
                                                            <span class='badge badge-success'>Activo</span>
                                                        @else
                                                            <span class='badge badge-danger'>Inactivo</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
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
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="link3">
                                Completely synergize resource taxing relationships via premier niche markets. Professionally
                                cultivate one-to-one customer service with robust ideas.
                                <br>
                                <br>Dynamically innovate resource-leveling customer service for state of the art customer
                                service.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
