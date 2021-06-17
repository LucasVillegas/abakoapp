@extends('layouts.app', ['activePage' => 'servicio', 'titlePage' => __('Detalle del Servicio')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row pt-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">
                                <b><a href="{{ route('servicios.index') }}">
                                        <i class="fa fa-list"></i> Listado de Servicios</a></b>
                            </h4>
                            <p class="card-category"> <i class="fa fa-id-badge"></i> Datos del Servicio</p>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-id-card"></i></span>
                                        <b> Tipo Servicio:</b> {{ $row->nombre_tipo_servicio }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-user"></i></span>
                                        <b> Trabajador:</b> {{ $row->nombre }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-calendar"></i></span>
                                        <b> Fecha Inicio:</b> {{ $row->fecha_inicio }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-calendar"></i></span>
                                        <b> Fecha Fin:</b> {{ $row->fecha_fin }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-money"></i></span>
                                        <b> Costo Supuesto:</b> {{ number_format($row->costo_supuesto) }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-money"></i></span>
                                        <b> Costo Real:</b> {{ number_format($row->costo_real) }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-money"></i></span>
                                        <b> Diferencia Costo:</b> {{ number_format($row->dif_costo) }}
                                    </h5>
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <h5>
                                        <span style="font-size: 1em;"><i class="fa fa-battery-full"></i></span>
                                        <b> Estado:</b>
                                        @if ($row->estado_Servicio == 1)
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
                                    <a href="{{ route('servicios.edit', $row->id) }}" class="btn btn-warning"
                                        id="enviar">
                                        <i class="fa fa-edit"></i> {{ __('Editar Servicio') }}
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
