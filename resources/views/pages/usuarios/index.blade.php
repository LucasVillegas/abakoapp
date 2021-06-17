@extends('layouts.app', ['activePage' => 'usuario', 'titlePage' => __('Tablero Usuarios')])

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
                    <a href="{{ route('usuarios.create') }}" class="btn btn-success pull-right"><span
                            class="material-icons">
                            person_add </span> Nuevo Usuario <div class="ripple-container">
                        </div>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">Tabla Usuarios</h4>
                            <p class="card-category"> Listado de Usuarios del sistema</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table class="table table-sm table-striped  text-center" id="tablaUsuario">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Usuario</th>
                                            <th>Correo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr class="text-center">
                                                <td>{{ $user->id }} </td>
                                                <td> {{ $user->persona->nombre }} </td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->persona->estado_persona == 1)
                                                        <span class='badge badge-success'>Activo</span>
                                                    @else
                                                        <span class='badge badge-danger'>Inactivo</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class='btn-group' role='group'>
                                                        <a href="{{ route('usuarios.show', $user->id) }}"
                                                            class="text-info btn-sm" style='outline: none;box-shadow: none'>
                                                            <i class="fa fa-eye"></i> ver
                                                        </a>
                                                        <a href="{{ route('usuarios.edit', $user->id) }}"
                                                            class="text-warning btn-sm"
                                                            style='outline: none;box-shadow: none'>
                                                            <i class="fa fa-edit"></i> Editar
                                                        </a>
                                                        <a href="#" class='text-danger btn-sm' data-toggle="modal"
                                                            data-target="#exampleModal"
                                                            style='outline: none;box-shadow: none'><i
                                                                class='fa fa-trash'></i> Eliminar</a>
                                                    </div>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col text-center">
                        <h5>Estas seguro quieres Eliminar a este Usuario</h5>
                        <h6>No Podras Revertirlo despues</h6>
                    </div>
                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">

                        <div class="col text-center">
                            <button type="submit" class="btn btn-danger">Eliminar Usuario</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
