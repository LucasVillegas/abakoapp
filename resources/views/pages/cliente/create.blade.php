@extends('layouts.app', ['activePage' => 'cliente', 'titlePage' => __('Nuevo Cliente')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"><b>Clientes</b> </h4>
                            <p class="card-category"> Crear Clientes Para el Sistema</p>
                        </div>
                        <div class="card-body">
                            <H4><b><i class="fa fa-id-card"></i> Datos Personales</b></H4>
                            <hr>
                            <form action="{{ route('clientes.store') }}" method="POST" id="formulario">
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('identificacion') ? ' has-danger' : '' }}">
                                            <label for="identificacion"
                                                class="bmd-label-floating">{{ __('Identificacion') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('identificacion') ? ' is-invalid' : '' }}"
                                                input type="number" name="identificacion" id="identificacion"
                                                {{-- placeholder="{{ __('Identificacion') }}" --}} value="" />
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
                                                input type="text" name="nombre" id="nombre" {{-- placeholder="{{ __('Nombres') }}" --}}
                                                value="" />
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
                                                input type="text" name="apellido" id="apellido" {{-- placeholder="{{ __('Apellidos') }}" --}}
                                                value="" />
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
                                                input type="number" name="telefono" id="telefono" {{-- placeholder="{{ __('Telefono') }}" --}}
                                                value="" />
                                            @if ($errors->has('telefono'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('telefono') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('genero') ? ' has-danger' : '' }}">
                                            {{-- <label class="mb-2">{{ __('Genero') }}</label> --}}
                                            <select name="genero" id="genero"
                                                class="form-control{{ $errors->has('genero') ? ' is-invalid' : '' }}">
                                                <option value="#">SELECCIONE GENERO</option>
                                                <option value="masculino">Masculino</option>
                                                <option value="femenino">Femenino</option>
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
                                                input type="text" name="direccion" id="direccion" {{-- placeholder="{{ __('Dirección') }}" --}}
                                                value="" />
                                            @if ($errors->has('direccion'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('direccion') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <H4><b>Datos Hubicacion</b></H4>
                                <hr>

                                <div class="row">

                                    {{-- <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('departamento') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('departamento') ? ' is-invalid' : '' }}"
                                                input type="text" name="departamento" id="departamento"
                                                placeholder="{{ __('Dirección') }}" value="" />
                                            @if ($errors->has('departamento'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('departamento') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('municipio') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('municipio') ? ' is-invalid' : '' }}"
                                                input type="text" name="municipio" id="municipio"
                                                placeholder="{{ __('Dirección') }}" value="" />
                                            @if ($errors->has('municipio'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('municipio') }}</span>
                                            @endif
                                        </div>
                                    </div> --}}

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('departamento') ? ' has-danger' : '' }}">
                                            <select name="departamento" id="departamento"
                                                class="form-control{{ $errors->has('departamento') ? ' is-invalid' : '' }}">
                                                <option value="#">SELECCIONES DEPARTAMENTO</option>
                                                @foreach ($departamentos as $item)
                                                    <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('departamento'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('departamento') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="selectmunicipios">
                                        <div class="form-group{{ $errors->has('municipio') ? ' has-danger' : '' }}">
                                            <select name="municipio" id="municipio"
                                                class="form-control{{ $errors->has('municipio') ? ' is-invalid' : '' }}">
                                                <option value="#">SELECCIONE CIUDAD</option>
                                                @foreach ($municipios as $items)
                                                    <option value="{{ $items->nombre }}">{{ $items->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('municipio'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('municipio') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row mb-0">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary" id="enviar">
                                            <i class="fa fa-save"></i> {{ __('Guardar Cliente') }}
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
