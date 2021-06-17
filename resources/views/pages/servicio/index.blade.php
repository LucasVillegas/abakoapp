@extends('layouts.app', ['activePage' => 'servicio', 'titlePage' => __('Tablero de Servicios')])

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
                    <a href="{{ route('servicios.create') }}" class="btn btn-success pull-right"><span
                            class="material-icons">
                            add_circle_outline
                        </span> Nuevo Servicio <div class="ripple-container">
                        </div>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">Tabla Tipo Servicio</h4>
                            <p class="card-category"> Listado de Tipos de Servicios del sistema</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive my-3">
                                <table class="table table-sm text-center">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Servicio</th>
                                            <th>Trabajador</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Costo Supuesto</th>
                                            <th>Costo Real</th>
                                            <th>Dif Costo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($servicio as $item)
                                            <tr>
                                                <td>{{ $item->servicio_id }}</td>
                                                <td>{{ $item->nombre_tipo_servicio }}</td>
                                                <td>{{ $item->nombre }}</td>
                                                <td>{{ $item->fecha_inicio }}</td>
                                                <td>{{ $item->fecha_fin }}</td>
                                                <td>{{ number_format($item->costo_supuesto) }}</td>
                                                <td>{{ number_format($item->costo_real) }}</td>
                                                <td>{{ number_format($item->dif_costo) }}</td>

                                                <td>
                                                    @if ($item->estado_Servicio == 1)
                                                        <span class='badge badge-success'>Activo</span>
                                                    @else
                                                        <span class='badge badge-danger'>Inactivo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->estado_Servicio == 1)
                                                        <div class='btn-group' role='group'>
                                                            <a href="{{ route('servicios.show', $item->servicio_id) }}"
                                                                class="text-info btn-sm"
                                                                style='outline: none;box-shadow: none'>
                                                                <i class="fa fa-eye"></i> ver
                                                            </a>

                                                            <a href="{{ route('servicios.edit', $item->servicio_id) }}"
                                                                class="text-warning btn-sm"
                                                                style='outline: none;box-shadow: none'>
                                                                <i class="fa fa-edit"></i> Editar
                                                            </a>

                                                            <a href="{{ route('servicios.block', $item->servicio_id) }}"
                                                                class='text-dark btn-sm' {{-- data-toggle="modal"
                                                                data-target="#Modal_Block" --}}
                                                                style='outline: none;box-shadow: none'><i
                                                                    class='fa fa-ban'></i>
                                                                Bloquear</a>

                                                            <a href="{{ route('servicios.destroy', $item->servicio_id) }}"
                                                                class='text-danger btn-sm'
                                                                style='outline: none;box-shadow: none'>
                                                                <input type="hidden" id="id" name="id"
                                                                    value="{{ $item->id }}">
                                                                <i class='fa fa-trash'></i> Eliminar</a>
                                                        </div>
                                                    @else
                                                        <a href="{{ route('servicios.activate', $item->servicio_id) }}"
                                                            class='text-success btn-sm' {{-- data-toggle="modal"
                                                            data-target="#Modal_Activate" --}}
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
                </div>
            </div>
        </div>
    </div>
@endsection
