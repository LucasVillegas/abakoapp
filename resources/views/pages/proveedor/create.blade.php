@extends('layouts.app', ['activePage' => 'proveedor', 'titlePage' => __('Nuevo Proveedores')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" id="tipo_prove">
                    <select name="proveedor" id="proveedor" class="form-control">
                        <option value="#">SELECCIONES TIPO DE PROVEEDOR</option>
                        <option value="natural"><b>Natural</b></option>
                        <option value="juridico"><b>Juridico </b></option>
                    </select>
                </div>
                <div class="col-md-12" id="body">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"><b>Proveedores</b> </h4>
                            <p class="card-category"> Crear Proveedores Para el Sistema</p>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('proveedores.store') }}" method="POST" id="formulario">
                                @csrf
                                <div class="row" id="natural">
                                    <div class="col-md-12">
                                        <H4><b><i class="fa fa-id-card"></i> Proveedor Natural</b></H4>
                                        <hr>
                                    </div>
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

                                <div class="row" id="juridica">
                                    <div class="col-md-12">
                                        <H4><b>Proveedor Juridico</b></H4>
                                        <hr>
                                    </div>

                                    <div class="col-md-6">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('nit') ? ' has-danger' : '' }}">
                                            <label for="nit" class="bmd-label-floating">{{ __('Nit') }}</label>
                                            <input class="form-control{{ $errors->has('nit') ? ' is-invalid' : '' }}"
                                                input type="number" name="nit" id="nit" value="" />
                                            @if ($errors->has('nit'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('nit') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('rut') ? ' has-danger' : '' }}">
                                            <label for="rut" class="bmd-label-floating">{{ __('Rut') }}</label>
                                            <input class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}"
                                                input type="text" name="rut" id="rut" value="" />
                                            @if ($errors->has('rut'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('rut') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('organizacion') ? ' has-danger' : '' }}">
                                            <label for="organizacion"
                                                class="bmd-label-floating">{{ __('Organización') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('organizacion') ? ' is-invalid' : '' }}"
                                                input type="text" name="organizacion" id="organizacion" value="" />
                                            @if ($errors->has('organizacion'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('organizacion') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label for="email" class="bmd-label-floating">{{ __('Correo') }}</label>
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                input type="email" name="email" id="email" value="" />
                                            @if ($errors->has('email'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row mb-0">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary" id="enviar">
                                            <i class="fa fa-save"></i> {{ __('Guardar Proveedor') }}
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
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $("#body").hide();
            $("#juridica").hide();
            $("#natural").hide();

            $('#proveedor').on('change', function(e) {
                $("#tipo_prove").hide();
                $("#body").show();
                e.preventDefault();
                if ($('#proveedor').val() == 'natural') {
                    $("#natural").show();
                }

                if ($('#proveedor').val() == 'juridico') {
                    $("#juridica").show();
                }
            });
        });

    </script>
@endsection
