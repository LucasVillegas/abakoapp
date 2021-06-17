@extends('layouts.app', ['activePage' => 'tipo_servicio', 'titlePage' => __('Tablero Tipos de Servicios')])

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
                    <a href="{{ route('tipo_servicios.create') }}" class="btn btn-success pull-right"><span
                            class="material-icons">
                            add_circle_outline
                        </span> Nuevo Tipo de Servicio <div class="ripple-container">
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
                                            <th>Nombre del Tipo de Servicio</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tipo_Servicio as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nombre_tipo_servicio }}</td>
                                                <td>
                                                    @if ($item->estado_tipo_servicio == 1)
                                                        <span class='badge badge-success'>Activo</span>
                                                    @else
                                                        <span class='badge badge-danger'>Inactivo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->estado_tipo_servicio == 1)
                                                        <div class='btn-group' role='group'>
                                                            {{-- <a href="{{ route('conductores.show', $item->id) }}"
                                                                class="text-info btn-sm"
                                                                style='outline: none;box-shadow: none'>
                                                                <i class="fa fa-eye"></i> ver
                                                            </a> --}}

                                                            <a href="{{ route('tipo_servicios.edit', $item->id) }}"
                                                                class="text-warning btn-sm"
                                                                style='outline: none;box-shadow: none'>
                                                                <i class="fa fa-edit"></i> Editar
                                                            </a>

                                                            <a href="{{ route('tipo_servicios.block', $item->id) }}"
                                                                class='text-dark btn-sm' {{-- data-toggle="modal" data-target="#Modal_Block" --}}
                                                                style='outline: none;box-shadow: none'><i
                                                                    class='fa fa-ban'></i>
                                                                Bloquear</a>

                                                            <a href="{{ route('tipo_servicios.destroy', $item->id) }}"
                                                                class='text-danger btn-sm'
                                                                style='outline: none;box-shadow: none'>
                                                                <input type="hidden" id="id" name="id"
                                                                    value="{{ $item->id }}">
                                                                <i class='fa fa-trash'></i> Eliminar</a>
                                                        </div>
                                                    @else
                                                        <a href="{{ route('tipo_servicios.activate', $item->id) }}"
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
