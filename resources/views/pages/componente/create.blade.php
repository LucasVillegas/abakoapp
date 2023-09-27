@extends('layouts.app', ['activePage' => 'componente', 'titlePage' => __('Nuevo Componente')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"><b>Componentes</b> </h4>
                            <p class="card-category"> Crear Componente Para el Sistema</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('componentes.store') }}" method="POST" id="formulario">
                                @csrf
                                <div class="col-md-12">
                                    <div
                                        class="form-group bmd-form-group{{ $errors->has('articulo') ? ' has-danger' : '' }}">
                                        <select name="articulo" id="articulo"
                                            class="form-control{{ $errors->has('articulo') ? ' is-invalid' : '' }}">
                                            <option value="#">SELECCIONE ARTICULO</option>
                                            @foreach ($articulo as $articulo)
                                                <option value="{{ $articulo->id }}">
                                                    {{ $articulo->descripcion }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('articulo'))
                                            <span id="name-error" class="error text-danger"
                                                for="input-name">{{ $errors->first('articulo') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="table-responsive mt-3">

                                    <table class="table table-sm text-center">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Descripcion</th>
                                                <th>Referencia</th>
                                                <th>Unidad</th>
                                                <th>Medida</th>
                                                <th>Ul.Coste</th>
                                                <th>Costo</th>
                                                <th class="td-actions text-right"><a href="javascript:;" rel="tooltip" class="btn btn-success addRow"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">add</i>
                                                        <div class="ripple-container"></div>
                                                    </a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-group bmd-form-group{{ $errors->has('codigo_componente') ? ' has-danger' : '' }}">
                                                        <input
                                                            class="form-control{{ $errors->has('codigo_componente') ? ' is-invalid' : '' }}"
                                                            input type="text" name="codigo_componente[]"
                                                            id="codigo_componente" placeholder="{{ __('Codigo') }}"
                                                            value="" />
                                                        @if ($errors->has('codigo_componente'))
                                                            <span id="name-error" class="error text-danger"
                                                                for="input-name">{{ $errors->first('codigo_componente') }}</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="form-group bmd-form-group{{ $errors->has('descripcion_componente') ? ' has-danger' : '' }}">
                                                        <input
                                                            class="form-control{{ $errors->has('descripcion_componente') ? ' is-invalid' : '' }}"
                                                            input type="text" name="descripcion_componente[]"
                                                            id="descripcion_componente"
                                                            placeholder="{{ __('Descripción') }}" value="" />

                                                    </div>
                                                </td>
                                                <td>
                                                    <input
                                                        class="form-control{{ $errors->has('referencia_componente') ? ' is-invalid' : '' }}"
                                                        input type="number" name="referencia_componente[]"
                                                        id="referencia_componente" placeholder="{{ __('Referencia') }}"
                                                        value="" />
                                                    @if ($errors->has('referencia_componente'))
                                                        <span id="name-error" class="error text-danger"
                                                            for="input-name">{{ $errors->first('referencia_componente') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input
                                                        class="form-control{{ $errors->has('unidad_componente') ? ' is-invalid' : '' }}"
                                                        input type="text" name="unidad_componente[]" id="unidad_componente"
                                                        placeholder="{{ __('Unidad Componente') }}" value="" />
                                                    @if ($errors->has('unidad_componente'))
                                                        <span id="name-error" class="error text-danger"
                                                            for="input-name">{{ $errors->first('unidad_componente') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input
                                                        class="form-control{{ $errors->has('medida_componente') ? ' is-invalid' : '' }}"
                                                        input type="number" name="medida_componente[]"
                                                        id="medida_componente"
                                                        placeholder="{{ __('Medida Componente') }}" value="" />
                                                    @if ($errors->has('medida_componente'))
                                                        <span id="name-error" class="error text-danger"
                                                            for="input-name">{{ $errors->first('medida_componente') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input
                                                        class="form-control{{ $errors->has('ultimo_coste') ? ' is-invalid' : '' }}"
                                                        input type="number" name="ultimo_coste[]" id="ultimo_coste" value=""
                                                        placeholder="Ultimo Coste Componente" />
                                                    @if ($errors->has('ultimo_coste'))
                                                        <span id="name-error" class="error text-danger"
                                                            for="input-name">{{ $errors->first('ultimo_coste') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <input
                                                        class="form-control{{ $errors->has('costo_total') ? ' is-invalid' : '' }}"
                                                        input type="number" name="costo_total[]" id="costo_total" value=""
                                                        placeholder="Costo Total" />
                                                    @if ($errors->has('costo_total'))
                                                        <span id="name-error" class="error text-danger"
                                                            for="input-name">{{ $errors->first('costo_total') }}</span>
                                                    @endif
                                                </td>
                                                <td class="td-actions text-right">
                                                    <a href="javascript:;" rel="tooltip" class="btn btn-danger deleteRow"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    {{-- <button type="button" rel="tooltip" class="btn btn-success"
                                                    data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-danger"
                                                    data-original-title="" title="">
                                                    <i class="material-icons">close</i>
                                                </button> --}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group row mb-0">
                                        <div class="card-footer ml-auto mr-auto">
                                            <button type="submit" class="btn btn-primary" id="enviar">
                                                <i class="fa fa-save"></i> {{ __('Guardar Componente') }}
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
    </div>
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script>
        $('thead').on('click', '.addRow', function() {
            var tr = '<tr>' +
                '<td>' +
                '<div class="form-group bmd-form-group">' +
                '<input class="form-control" input type="text" name="codigo_componente[]" id="codigo_componente" placeholder="Codigo" value="" />' +
                '</div>' +
                '</td>' +

                '<td>' +
                '<div  class="form-group bmd-form-group">' +
                '<input  class="form-control"  input type="text" name="descripcion_componente[]" id="descripcion_componente" placeholder="Descripción" value="" />' +
                '</div>' +
                '</td>' +

                '<td>' +
                '<input class="form-control" input type="number" name="referencia_componente[]" id="referencia_componente" placeholder="Referencia"value="" />' +
                '</td>' +

                '<td>' +
                '<input class="form-control" input type="text" name="unidad_componente[]" id="unidad_componente" placeholder="Unidad Componente" value="" />' +
                '</td>' +

                '<td>' +
                '<input class="form-control" input type="number" name="medida_componente[]" id="medida_componente" placeholder="Medida Componente" value="" />' +
                '</td>' +

                '<td>' +
                '<input class="form-control" input type="number" name="ultimo_coste[]" id="ultimo_coste" value="" placeholder="Ultimo Coste Componente" />' +
                '</td>' +

                '<td>' +
                '<input class="form-control" input type="number" name="costo_total[]" id="costo_total" value="" placeholder="Costo Total" />' +
                '</td>' +

                '<td class="td-actions text-right">' +
                ' <a href="javascript:;" rel="tooltip" class="btn btn-danger deleteRow" data-original-title="" title="">' +
                ' <i class="material-icons">close</i>' +
                '<div class="ripple-container"></div>' +
                '</a>' +
                '</td>' +
                '</tr>';
            $('tbody').append(tr);
        });

        $('tbody').on('click', '.deleteRow', function() {
            $(this).parent().parent().remove();
        });

    </script>
@endsection
