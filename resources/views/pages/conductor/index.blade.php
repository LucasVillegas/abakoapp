@extends('layouts.app', ['activePage' => 'conductor', 'titlePage' => __('Tablero Conductor')])

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
                    <a href="{{ route('conductores.create') }}" class="btn btn-success pull-right"><span
                            class="material-icons">
                            person_add</span> Nuevo Conductor <div class="ripple-container">
                        </div>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">Tabla Conductor</h4>
                            <p class="card-category"> Listado de Conductor del sistema</p>
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
                                            <th>Transportadora</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($conductores as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->persona->identificacion }}</td>
                                                <td>{{ $item->persona->nombre }}</td>
                                                <td>{{ $item->persona->apellido }}</td>
                                                <td>{{ $item->persona->genero }}</td>
                                                <td>{{ $item->persona->telefono }}</td>
                                                <td>{{ $item->persona->direccion }}</td>
                                                <td>{{ $item->transportadora }}</td>
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
                                                            <a href="{{ route('conductores.show', $item->id) }}"
                                                                class="text-info btn-sm"
                                                                style='outline: none;box-shadow: none'>
                                                                <i class="fa fa-eye"></i> ver
                                                            </a>

                                                            <a href="{{ route('conductores.edit', $item->id) }}"
                                                                class="text-warning btn-sm"
                                                                style='outline: none;box-shadow: none'>
                                                                <i class="fa fa-edit"></i> Editar
                                                            </a>

                                                            <a href="{{ route('conductores.block', $item->persona->id) }}"
                                                                class='text-dark btn-sm' {{-- data-toggle="modal" data-target="#Modal_Block" --}}
                                                                style='outline: none;box-shadow: none'><i
                                                                    class='fa fa-ban'></i>
                                                                Bloquear</a>

                                                            <a href="{{ route('conductores.destroy', $item->persona->id) }}"
                                                                class='text-danger btn-sm' {{-- data-toggle="modal"
                                                                data-target="#exampleModal" --}}
                                                                style='outline: none;box-shadow: none'>

                                                                <i class='fa fa-trash'></i> Eliminar</a>
                                                        </div>
                                                    @else
                                                        <a href="{{ route('conductores.activate', $item->persona->id) }}"
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
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button type="submit" class="btn btn-danger">{{-- <i class="fa fa-trash"> Eliminar
Trabajador</button>
</div>
</div>
</form>
</div>
</div>
</div> --}}

@endsection
