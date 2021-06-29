@extends('layouts.app', ['activePage' => 'trabajador', 'titlePage' => __('Tablero Trabajador')])

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
                    <a href="{{ route('trabajadores.create') }}" class="btn btn-success pull-right"><span
                            class="material-icons">
                            person_add</span> Nuevo Trabajador <div class="ripple-container">
                        </div>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">Tabla Trabajador</h4>
                            <p class="card-category"> Listado de Trabajador del sistema</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive my-3">
                                <table class="table table-sm text-center" id="datatable">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Idenficicación</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Genero</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trabajador as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->persona->identificacion }}</td>
                                                <td>{{ $item->persona->nombre }}</td>
                                                <td>{{ $item->persona->apellido }}</td>
                                                <td>{{ $item->persona->genero }}</td>
                                                <td>{{ $item->persona->telefono }}</td>
                                                <td>{{ $item->persona->direccion }}</td>
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
                                                            <a href="{{ route('trabajadores.show', $item->id) }}"
                                                                class="text-info btn-sm"
                                                                style='outline: none;box-shadow: none'>
                                                                <i class="fa fa-eye"></i> ver
                                                            </a>

                                                            <a href="{{ route('trabajadores.edit', $item->id) }}"
                                                                class="text-warning btn-sm"
                                                                style='outline: none;box-shadow: none'>
                                                                <i class="fa fa-edit"></i> Editar
                                                            </a>

                                                            <a href="{{ route('trabajadores.block', $item->persona->id) }}"
                                                                class='text-dark btn-sm' {{-- data-toggle="modal" data-target="#Modal_Block" --}}
                                                                style='outline: none;box-shadow: none'><i
                                                                    class='fa fa-ban'></i>
                                                                Bloquear</a>

                                                            <a href="{{ route('trabajadores.destroy', $item->persona->id) }}"
                                                                class='text-danger btn-sm' data-toggle="modal"
                                                                data-target="#exampleModal"
                                                                style='outline: none;box-shadow: none'>
                                                                <input type="hidden" id="id" name="id"
                                                                    value="{{ $item->persona->id }}">
                                                                <i class='fa fa-trash'></i> Eliminar</a>
                                                        </div>
                                                    @else
                                                        <a href="{{ route('trabajadores.activate', $item->persona->id) }}"
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

    <!-- Modal Eliminar-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar Trabajador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col text-center">
                        <h5>Estas Seguro Quieres Eliminar a este Trabajador</h5>
                        <h6>No Podras Revertirlo despues</h6>
                    </div>
                    <form action="{{ route('trabajadores.destroy', $item->persona->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-danger">{{-- <i class="fa fa-trash"> --}}Eliminar
                                Trabajador</button>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Bloquear Trabajador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col text-center">
                        <h5>Estas Seguro Quieres Bloquear a este Trabajador</h5>
                        <h6>Podras Revertirlo despues</h6>
                    </div>
                    {{-- <form action="{{ route('trabajadores.block', $item->persona->id) }}" method="GET">
                    @csrf
                </form> --}}
                    <div class="col text-center">
                        <a href="{{ route('trabajadores.block', $item->persona->id) }}" class="btn btn-success"><i
                                class='fa fa-ban'></i>
                            Bloquear Trabajador</a>
                        {{-- <button type="submit" class="btn btn-success"><i class='fa fa-ban'></i> Bloquear
                        Trabajador</button> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Activar-->
    <div class="modal fade" id="Modal_Activate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Activar Trabajador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col text-center">
                        <h5>Estas Seguro Quieres Activar a este Trabajador</h5>
                        <h6>Podras Revertirlo despues</h6>
                    </div>
                    <form action="{{ route('trabajadores.activate', $item->persona->id) }}" method="GET">
                        @csrf
                        <div class="col text-center">
                            <button type="submit" class="btn btn-success"><i class='fa fa-undo'></i> Activar
                                Trabajador</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
