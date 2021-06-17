@extends('layouts.app', ['activePage' => 'conductor', 'titlePage' => __('Detalle del Conductor')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row pt-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">
                                <b><a href="{{ route('conductores.index') }}">
                                        <i class="fa fa-list"></i> Listado de Conductores</a></b>
                            </h4>
                            <p class="card-category"> <i class="fa fa-id-badge"></i> Datos del Conductor</p>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-id-card"></i></span>
                                        <b> Identificaón:</b> {{ $conductores->persona->identificacion }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-user"></i></span>
                                        <b> Nombres:</b> {{ $conductores->persona->nombre }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-user"></i></span>
                                        <b> Apellidos:</b> {{ $conductores->persona->apellido }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-mobile"></i></span>
                                        <b> Telefono:</b> {{ $conductores->persona->telefono }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-map-marker"></i></span>
                                        <b> Direcci&ograve;n:</b> {{ $conductores->persona->direccion }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-venus-mars"></i></span>
                                        <b> Genero:</b> {{ $conductores->persona->genero }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-car"></i></span>
                                        <b> Transportadora:</b> {{ $conductores->transportadora }}
                                    </h5>
                                    <hr>
                                </div>

                                {{-- <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-at"></i></span>
                                        <b> Correo:</b> {{ $conductores->email }}
                                    </h5>
                                    <hr>
                                </div> --}}

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-battery-full"></i></span>
                                        <b> Estado:</b>
                                        @if ($conductores->persona->estado_persona == 1)
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
                                    <a href="{{ route('conductores.edit', $conductores->id) }}" class="btn btn-warning"
                                        id="enviar">
                                        <i class="fa fa-edit"></i> {{ __('Editar Cliente') }}
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
