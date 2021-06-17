@extends('layouts.app', ['activePage' => 'conductor', 'titlePage' => __('Editar Conductores')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"><b><a href="{{ route('conductores.index') }}">
                                        Conductores</a></b></h4>
                            <p class="card-category"> Editar Conductores Para el Sistema</p>
                        </div>
                        <div class="card-body">
                            <H4><b><i class="fa fa-id-card"></i> Datos Personales</b></H4>
                            <hr>
                            <form action="{{ route('conductores.update', $conductores->persona->id) }}" method="POST"
                                id="formulario">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <input type="hidden" id="id" name="id"
                                        value="{{ old('id', $conductores->persona->id) }}">
                                    <input type="hidden" id="idc" name="idc" value="{{ old('idc', $conductores->id) }}">
                                    <div class="col-md-4">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('identificacion') ? ' has-danger' : '' }}">
                                            <label for="identificacion"
                                                class="bmd-label-floating">{{ __('Identificacion') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('identificacion') ? ' is-invalid' : '' }}"
                                                input type="number" name="identificacion" id="identificacion"
                                                placeholder="{{ __('Identificacion') }}"
                                                value="{{ old('identificacion', $conductores->persona->identificacion) }}" />
                                            @if ($errors->has('identificacion'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('identificacion') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                            <label for="nombre" class="bmd-label-floating">{{ __('Nombres') }}</label>
                                            <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                                input type="text" name="nombre" id="nombre"
                                                placeholder="{{ __('Nombres') }}"
                                                value="{{ old('nombre', $conductores->persona->nombre) }}" />
                                            @if ($errors->has('nombre'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('nombre') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                                            <label for="apellido"
                                                class="bmd-label-floating">{{ __('Apellidos') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}"
                                                input type="text" name="apellido" id="apellido"
                                                placeholder="{{ __('Apellidos') }}"
                                                value="{{ old('apellido', $conductores->persona->apellido) }}" />
                                            @if ($errors->has('apellido'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('apellido') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                            <label for="telefono" class="bmd-label-floating">{{ __('Telefono') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                                input type="number" name="telefono" id="telefono"
                                                placeholder="{{ __('Telefono') }}"
                                                value="{{ old('telefono', $conductores->persona->telefono) }}" />
                                            @if ($errors->has('telefono'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('telefono') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('genero') ? ' has-danger' : '' }}">

                                            <select name="genero" id="genero"
                                                class="form-control{{ $errors->has('genero') ? ' is-invalid' : '' }}">
                                                <option value="#">SELECCIONE GENERO</option>
                                                <option value="masculino" @if (old('genero', $conductores->persona->genero) == 'masculino') {{ 'selected' }} @endif>Masculino</option>
                                                <option value="femenino" @if (old('genero', $conductores->persona->genero) == 'femenino') {{ 'selected' }} @endif>Femenino</option>
                                            </select>
                                            </select>
                                            @if ($errors->has('genero'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('genero') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                                            <label for="direccion"
                                                class="bmd-label-floating">{{ __('Direccón') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                                input type="text" name="direccion" id="direccion"
                                                placeholder="{{ __('Dirección') }}"
                                                value="{{ old('direccion', $conductores->persona->direccion) }}" />
                                            @if ($errors->has('direccion'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('direccion') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <H4><b>Datos Conductor</b></H4>
                                <hr>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('transportadora') ? ' has-danger' : '' }}">
                                            <label for="transportadora"
                                                class="bmd-label-floating">{{ __('Transportadora') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('transportadora') ? ' is-invalid' : '' }}"
                                                input type="text" name="transportadora" id="transportadora"
                                                placeholder="{{ __('Transportadora') }}"
                                                value="{{ old('transportadora', $conductores->transportadora) }}" />
                                            @if ($errors->has('transportadora'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('transportadora') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row mb-0">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary" id="enviar">
                                            <i class="fa fa-save"></i> {{ __('Guardar Conductor') }}
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
