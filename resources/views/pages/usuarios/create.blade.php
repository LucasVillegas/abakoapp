@extends('layouts.app', ['activePage' => 'usuario', 'titlePage' => __('Nuevo Usuario')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"><b>Usuarios</b> </h4>
                            <p class="card-category"> Crear Usuario Para el Sistema</p>
                        </div>
                        <div class="card-body">
                            <H4><b><i class="fa fa-id-card"></i> Datos Personales</b></H4>
                            <hr>
                            <form action="{{ route('usuarios.store') }}" method="POST" id="formulario">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('identificacion') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('identificacion') ? ' is-invalid' : '' }}"
                                                input type="number" name="identificacion" id="identificacion"
                                                placeholder="{{ __('Identificacion') }}" value="" />
                                            @if ($errors->has('identificacion'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name"><b>{{ $errors->first('identificacion') }}</b></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                                input type="text" name="nombre" id="nombre"
                                                placeholder="{{ __('Nombres') }}" value="" />
                                            @if ($errors->has('nombre'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('nombre') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}"
                                                input type="text" name="apellido" id="apellido"
                                                placeholder="{{ __('Apellidos') }}" value="" />
                                            @if ($errors->has('apellido'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('apellido') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                                input type="number" name="telefono" id="telefono"
                                                placeholder="{{ __('Telefono') }}" value="" />
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
                                                <option value="#">GENERO</option>
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
                                        <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                                input type="text" name="direccion" id="direccion"
                                                placeholder="{{ __('Dirección') }}" value="" />
                                            @if ($errors->has('direccion'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('direccion') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <H4><b><i class="fa fa-user-circle"></i> Datos Cuenta</b></H4>
                                <hr>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                input type="text" name="username" id="username"
                                                placeholder="{{ __('Usuario') }}" value="" />
                                            @if ($errors->has('username'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                input type="email" name="email" id="email"
                                                placeholder="{{ __('Correo Electronico') }}" value="" />
                                            @if ($errors->has('email'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                input type="password" name="password" id="password"
                                                placeholder="{{ __('Contraseña') }}" value="" />
                                            @if ($errors->has('password'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div
                                            class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                                input type="password" name="password_confirmation"
                                                id="password_confirmation" placeholder="{{ __('Confirmar Contraseña') }}"
                                                value="" />
                                            @if ($errors->has('password_confirmation'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary" id="enviar">
                                            <i class="fa fa-save"></i> {{ __('Guardar Usuario') }}
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
