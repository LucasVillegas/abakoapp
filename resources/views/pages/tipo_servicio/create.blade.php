@extends('layouts.app', ['activePage' => 'tipo_servicio', 'titlePage' => __('Nuevo Tipo de Servicio')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"><b>Tipos de Servicios</b> </h4>
                            <p class="card-category"> Crear Tipo de Servicio Para el Sistema</p>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('tipo_servicios.store') }}" method="POST" id="formulario">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('nombre_tipo_servicio') ? ' has-danger' : '' }}">
                                            <label for="nombre_tipo_servicio"
                                                class="bmd-label-floating">{{ __('Tipo de Servicio') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('nombre_tipo_servicio') ? ' is-invalid' : '' }}"
                                                input type="text" name="nombre_tipo_servicio" id="nombre_tipo_servicio"
                                                {{-- placeholder="{{ __('Tipo de Servicio') }}" --}} value="" />
                                            @if ($errors->has('nombre_tipo_servicio'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('nombre_tipo_servicio') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row mb-0">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary" id="enviar">
                                            <i class="fa fa-save"></i> {{ __('Guardar Tipo de Servicio') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
