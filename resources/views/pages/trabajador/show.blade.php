@extends('layouts.app', ['activePage' => 'trabajador', 'titlePage' => __('Detalle del Trabajador')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row pt-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">
                                <b><a href="{{ route('trabajadores.index') }}">
                                        <i class="fa fa-list"></i> Listado de Trabajadores</a></b>
                            </h4>
                            <p class="card-category"> <i class="fa fa-id-badge"></i> Datos del Trabajador</p>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-id-card"></i></span>
                                        <b> Identificaón:</b> {{ $trabajador->persona->identificacion }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-user"></i></span>
                                        <b> Nombres:</b> {{ $trabajador->persona->nombre }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-user"></i></span>
                                        <b> Apellidos:</b> {{ $trabajador->persona->apellido }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-mobile"></i></span>
                                        <b> Telefono:</b> {{ $trabajador->persona->telefono }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-map-marker"></i></span>
                                        <b> Direcci&ograve;n:</b> {{ $trabajador->persona->direccion }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-venus-mars"></i></span>
                                        <b> Genero:</b> {{ $trabajador->persona->genero }}
                                    </h5>
                                    <hr>
                                </div>

                                {{-- <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-user"></i></span>
                                        <b> Usuario:</b> {{ $trabajadores->username }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-at"></i></span>
                                        <b> Correo:</b> {{ $trabajadores->email }}
                                    </h5>
                                    <hr>
                                </div> --}}

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-battery-full"></i></span>
                                        <b> Estado:</b>
                                        @if ($trabajador->persona->estado_persona == 1)
                                            <span class='badge badge-success'>Activo</span>
                                        @else
                                            <span class='badge badge-danger'>Inactivo</span>
                                        @endif
                                    </h5>
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="card-footer ml-auto mr-auto">
                                    <a href="{{ route('trabajadores.edit', $trabajador->id) }}" class="btn btn-warning"
                                        id="enviar">
                                        <i class="fa fa-edit"></i> {{ __('Editar Trabajador') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
