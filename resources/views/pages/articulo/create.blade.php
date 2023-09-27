@extends('layouts.app', ['activePage' => 'articulo', 'titlePage' => __('Nuevo Articulo')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"><b>Articulos</b> </h4>
                            <p class="card-category"> Crear Articulo Para el Sistema</p>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('articulos.store') }}" method="POST" id="formulario">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('tipo_articulo') ? ' has-danger' : '' }}">
                                            <select name="tipo_articulo" id="tipo_articulo"
                                                class="form-control{{ $errors->has('tipo_articulo') ? ' is-invalid' : '' }}">
                                                <option value="#">SELECCIONE TIPO DE ARTICULO</option>
                                                @foreach ($serie_Articulo as $serie_Articulo)
                                                    <option value="{{ $serie_Articulo->id }}">
                                                        {{ $serie_Articulo->descripcion_serie_articulo }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('tipo_articulo'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('tipo_articulo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('codigo_articulo') ? ' has-danger' : '' }}">
                                            <label for="codigo_articulo"
                                                class="bmd-label-floating">{{ __('Codigo Articulo') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('codigo_articulo') ? ' is-invalid' : '' }}"
                                                input type="text" name="codigo_articulo" id="codigo_articulo"
                                                {{-- placeholder="{{ __('Tipo de Servicio') }}" --}} value="" />
                                            @if ($errors->has('codigo_articulo'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('codigo_articulo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-10 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('descripcion_articulo') ? ' has-danger' : '' }}">
                                            <label for="descripcion_articulo"
                                                class="bmd-label-floating">{{ __('Descripción Articulo') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('descripcion_articulo') ? ' is-invalid' : '' }}"
                                                input type="text" name="descripcion_articulo" id="descripcion_articulo"
                                                {{-- placeholder="{{ __('Tipo de Servicio') }}" --}} value="" />
                                            @if ($errors->has('descripcion_articulo'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('descripcion_articulo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('referencia_articulo') ? ' has-danger' : '' }}">
                                            <label for="referencia_articulo"
                                                class="bmd-label-floating">{{ __('Referencia Articulo') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('referencia_articulo') ? ' is-invalid' : '' }}"
                                                input type="text" name="referencia_articulo" id="referencia_articulo"
                                                {{-- placeholder="{{ __('Tipo de Servicio') }}" --}} value="" />
                                            @if ($errors->has('referencia_articulo'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('referencia_articulo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('medida_articulo') ? ' has-danger' : '' }}">
                                            <label for="medida_articulo"
                                                class="bmd-label-floating">{{ __('Medida Articulo') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('medida_articulo') ? ' is-invalid' : '' }}"
                                                input type="text" name="medida_articulo" id="medida_articulo"
                                                {{-- placeholder="{{ __('Tipo de Servicio') }}" --}} value="" />
                                            @if ($errors->has('medida_articulo'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('medida_articulo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('costo_articulo') ? ' has-danger' : '' }}">
                                            <label for="costo_articulo"
                                                class="bmd-label-floating">{{ __('Costo Articulo') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('costo_articulo') ? ' is-invalid' : '' }}"
                                                input type="number" name="costo_articulo" id="costo_articulo"
                                                {{-- placeholder="{{ __('Tipo de Servicio') }}" --}} value="" />
                                            @if ($errors->has('costo_articulo'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('costo_articulo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('precio_venta') ? ' has-danger' : '' }}">
                                            <label for="precio_venta"
                                                class="bmd-label-floating">{{ __('Precio Venta Articulo') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('precio_venta') ? ' is-invalid' : '' }}"
                                                input type="number" name="precio_venta" id="precio_venta"
                                                {{-- placeholder="{{ __('Tipo de Servicio') }}" --}} value="" />
                                            @if ($errors->has('precio_venta'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('precio_venta') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('precio_minimo') ? ' has-danger' : '' }}">
                                            <label for="precio_minimo"
                                                class="bmd-label-floating">{{ __('Precio Minimo Articulo') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('precio_minimo') ? ' is-invalid' : '' }}"
                                                input type="number" name="precio_minimo" id="precio_minimo"
                                                {{-- placeholder="{{ __('Tipo de Servicio') }}" --}} value="" />
                                            @if ($errors->has('precio_minimo'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('precio_minimo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div
                                            class="form-group bmd-form-group{{ $errors->has('precio_ultimo') ? ' has-danger' : '' }}">
                                            <label for="precio_ultimo"
                                                class="bmd-label-floating">{{ __('Ultimo Costo') }}</label>
                                            <input
                                                class="form-control{{ $errors->has('precio_ultimo') ? ' is-invalid' : '' }}"
                                                input type="number" name="precio_ultimo" id="precio_ultimo"
                                                {{-- placeholder="{{ __('Tipo de Servicio') }}" --}} value="" />
                                            @if ($errors->has('precio_ultimo'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('precio_ultimo') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row mb-0">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary" id="enviar">
                                            <i class="fa fa-save"></i> {{ __('Guardar Articulo') }}
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
