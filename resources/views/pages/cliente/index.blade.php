@extends('layouts.app', ['activePage' => 'cliente', 'titlePage' => __('Tablero Clientes')])

@section('content')
<div class="content">
    <div class="container-fluid">
        @if (Session::has('info'))
            {{-- Alerta --}}
            <div class="alert alert-success alerta">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
                <span>
                    <b> Exito - </b> {{ Session::get('info') }}</span>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('clientes.create') }}" class="btn btn-success pull-right"><span
                        class="material-icons">
                        person_add</span> Nuevo Cliente <div class="ripple-container">
                    </div>
                </a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title ">Tabla Cliente</h4>
                        <p class="card-category"> Listado de Clientes del sistema</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive my-3">
                            <table class="table table-sm text-center">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Idenficicación</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Genero</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Ciudad</th>
                                        <th>Departamento</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->persona->identificacion }}</td>
                                            <td>{{ $item->persona->nombre }}</td>
                                            <td>{{ $item->persona->apellido }}</td>
                                            <td>{{ $item->persona->genero }}</td>
                                            <td>{{ $item->persona->telefono }}</td>
                                            <td>{{ $item->persona->direccion }}</td>
                                            <td>{{ $item->departamento }}</td>
                                            <td>{{ $item->municipio }}</td>
                                            <td>
                                                @if ($item->persona->estado_persona == 1)
                                                    <span class='badge badge-success'>Activo</span>
                                                    @else
                                                    <span class='badge badge-danger'>Inactivo</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->persona->estado_persona == 1)
                                                    <div class='btn-group' role='group'>
                                                        <a href="{{ route('clientes.show', $item->id) }}"
                                                            class="text-info btn-sm"
                                                            style='outline: none;box-shadow: none'>
                                                            <i class="fa fa-eye"></i> ver
                                                        </a>

                                                        <a href="{{ route('clientes.edit', $item->id) }}"
                                                            class="text-warning btn-sm"
                                                            style='outline: none;box-shadow: none'>
                                                            <i class="fa fa-edit"></i> Editar
                                                        </a>

                                                        <a href="{{ route('clientes.block', $item->persona->id) }}"
                                                            class='text-dark btn-sm' {{-- data-toggle="modal"
                                                            data-target="#Modal_Block" --}}
                                                            style='outline: none;box-shadow: none'><i
                                                                class='fa fa-ban'></i>
                                                            Bloquear</a>
                                                        <form
                                                            action="{{ route('clientes.destroy', $item->persona->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="#" class='text-danger btn-sm' data-toggle="modal"
                                                                data-target="#exampleModal"
                                                                style='outline: none;box-shadow: none'><i
                                                                    class='fa fa-trash'></i> Eliminar</a>
                                                        </form>
                                                    </div>
                                                    @else
                                                    <a href="{{ route('clientes.activate', $item->persona->id) }}"
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

{{-- <!-- Modal  Create-->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title ">Roles</h4>
                        <p class="card-category"> Agregar Nuevo Rol</p>
                    </div>
                    <div class="card-body">
                        <div class="modal-body">
                            <form action="">
                                <div class="row">
                                    {{-- <label class="col-sm-2 col-form-label" for="rol">{{ __('Rol') }}</label>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input class="form-control" name="rol" id="rol" type="text"
                                                placeholder="{{ __('Nuevo Rol') }}" required />
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="pull-right mt-2">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-times-circle"></i> Cerrar</button>
                                <button type="button" class="btn btn-primary"><i class="fa fa-save"></i>
                                    Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

<!-- Modal Eliminar-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Eliminar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col text-center">
                    <h5>Estas Seguro Quieres Eliminar a este Cliente</h5>
                    <h6>No Podras Revertirlo despues</h6>
                </div>
                <form action="{{ route('clientes.destroy', $item->persona->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">

                    <div class="col text-center">
                        <button type="submit" class="btn btn-danger">Eliminar Cliente</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Bloquear-->
<div class="modal fade" id="Modal_Block" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Bloquear Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col text-center">
                    <h5>Estas Seguro Quieres Bloquear a este Cliente</h5>
                    <h6>Podras Revertirlo despues</h6>
                </div>
                <form action="{{ route('clientes.block', $item->persona->id) }}" method="GET">
                    @csrf
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success"><i class='fa fa-ban'></i> Bloquear
                            Cliente</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Activar-->
<div class="modal fade" id="Modal_Activate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Activar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col text-center">
                    <h5>Estas Seguro Quieres Activar a este Cliente</h5>
                    <h6>Podras Revertirlo despues</h6>
                </div>
                <form action="{{ route('clientes.activate', $item->persona->id) }}" method="GET">
                    @csrf
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success"><i class='fa fa-undo'></i> Activar
                            Cliente</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
