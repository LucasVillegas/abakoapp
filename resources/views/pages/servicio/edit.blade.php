@extends('layouts.app', ['activePage' => 'servicio', 'titlePage' => __('Nuevo Servicio')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"><b>Servicios</b> </h4>
                            <p class="card-category"> Crear Servicio Para el Sistema</p>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('servicios.update', $row->servicio_id) }}" method="POST"
                                id="formulario">
                                @csrf
                                @method('PATCH')
                                <div class="row">

                                    <div class="col-md-6">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('nombre_tipo_servicio') ? ' has-danger' : '' }}">
                                            <select name="trabajador" id="trabajador"
                                                class="form-control{{ $errors->has('nombre_tipo_servicio') ? ' is-invalid' : '' }}">
                                                {{-- <option value="#">SELECCIONE TRABAJADOR</option> --}}
                                                <option value="{{ $row->trabajador_id }}" @if (old('trabajador', $row->nombre) == '{{ $row->nombre }}') {{ 'selected' }} @endif>
                                                    {{ $row->nombre }}</option>
                                                @foreach ($trabajador as $trabajador)
                                                    <option value="{{ $trabajador->id }}">
                                                        {{ $trabajador->persona->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('nombre_tipo_servicio'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('nombre_tipo_servicio') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('nombre_tipo_servicio') ? ' has-danger' : '' }}">
                                            <select name="tipo_Servicio" id="tipo_Servicio"
                                                class="form-control{{ $errors->has('nombre_tipo_servicio') ? ' is-invalid' : '' }}">
                                                {{-- <option value="#">SELECCIONE TIPO DE SERVICIO</option> --}}
                                                <option value="{{ $row->tipo_servicio_id }}" @if (old('tipo_Servicio', $row->nombre_tipo_servicio) == '{{ $row->nombre_tipo_servicio }}') {{ 'selected' }} @endif>
                                                    {{ $row->nombre_tipo_servicio }}</option>
                                                @foreach ($tipo_Servicio as $tipo_Servicio)
                                                    <option value="{{ $tipo_Servicio->id }}">
                                                        {{ $tipo_Servicio->nombre_tipo_servicio }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('nombre_tipo_servicio'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('nombre_tipo_servicio') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('fecha_inicio') ? ' has-danger' : '' }}">
                                            <label for="fecha_inicio"
                                                {{-- class="bmd-label-floating" > --}}>{{ __('Fecha Inicio') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}"
                                                input type="date" name="fecha_inicio" id="fecha_inicio"
                                                value="{{ old('fecha_inicio', $row->fecha_inicio) }}" />
                                            @if ($errors->has('fecha_inicio'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('fecha_inicio') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('fecha_fin') ? ' has-danger' : '' }}">
                                            <label for="fecha_fin"> {{ __('Fecha Fin') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('fecha_fin') ? ' is-invalid' : '' }}"
                                                input type="date" name="fecha_fin" id="fecha_fin"
                                                value="{{ old('fecha_fin', $row->fecha_fin) }}" />
                                            @if ($errors->has('fecha_fin'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('fecha_fin') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('costo_supuesto') ? ' has-danger' : '' }}">
                                            <label for="costo_supuesto"
                                                class="bmd-label-floating">{{ __('Costo Supuesto') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('costo_supuesto') ? ' is-invalid' : '' }}"
                                                input type="number" name="costo_supuesto" id="costo_supuesto"
                                                value="{{ old('costo_supuesto', $row->costo_supuesto) }}" />
                                            @if ($errors->has('costo_supuesto'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('costo_supuesto') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('costo_real') ? ' has-danger' : '' }}">
                                            <label for="costo_real"
                                                class="bmd-label-floating">{{ __('Costo Real') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('costo_real') ? ' is-invalid' : '' }}"
                                                input type="number" name="costo_real" id="costo_real"
                                                value="{{ old('costo_real', $row->costo_real) }}" />
                                            @if ($errors->has('costo_real'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('costo_real') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('diferencia_costo') ? ' has-danger' : '' }}">
                                            <label for="diferencia_costo"
                                                class="bmd-label-floating">{{ __('Diferencia Costo') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('diferencia_costo') ? ' is-invalid' : '' }}"
                                                input type="number" name="diferencia_costo" id="diferencia_costo"
                                                {{-- placeholder="{{ __('Tipo de Servicio') }}" --}}
                                                value="{{ old('diferencia_costo', $row->dif_costo) }}" />
                                            @if ($errors->has('diferencia_costo'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('diferencia_costo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row mb-0">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary" id="enviar">
                                            <i class="fa fa-save"></i> {{ __('Guardar Servicio') }}
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
