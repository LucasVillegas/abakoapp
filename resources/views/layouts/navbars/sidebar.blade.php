<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="https://creative-tim.com/" class="simple-text logo-normal">
            {{ __('Abako App') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Tablero') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i class="material-icons">
                        manage_accounts
                    </i>
                    <p>{{ __('Configuración') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'cliente' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('clientes.index') }}">
                                <i class="material-icons">groups</i>
                                <p>{{ __('Clientes') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'trabajador' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('trabajadores.index') }}">
                                <i class="material-icons">hail</i>
                                <p>{{ __('Traajadores') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'conductor' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('conductores.index') }}">
                                <i class="material-icons">local_shipping</i>
                                <p>{{ __('Conductores') }}</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item{{ $activePage == 'proveedor' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('proveedores.index') }}">
                                <i class="material-icons">
                                    transfer_within_a_station
                                </i>
                                <p>{{ __('Proveedores') }}</p>
                            </a>
                        </li> --}}
                        <li class=" nav-item{{ $activePage == 'usuario' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('usuarios.index') }}">
                                <i class="material-icons">people_alt</i>
                                <p><b>{{ __('Usuarios') }}</b></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li
                class="nav-item {{ $activePage == 'servicio' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#servicio" aria-expanded="true">
                    <i class="material-icons">
                        inventory_2
                    </i>
                    <p>{{ __('Servicios') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="servicio">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'tipo_servicio' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('tipo_servicios.index') }}">
                                <i class="material-icons">design_services</i>
                                <p>{{ __('Tipo Servicios') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'servicio' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('servicios.index') }}">
                                <i class="material-icons">hail</i>
                                <p>{{ __('Servicios') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ $activePage == 'almacen' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#almacen" aria-expanded="true">
                    <i class="material-icons">
                        precision_manufacturing
                    </i>
                    <p>{{ __('Alamacén') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="almacen">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'componente' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('componentes.index') }}">
                                <i class="material-icons">widgets</i>
                                <p>{{ __('Componentes') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'tipo_articulo' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('serie_articulos.index') }}">
                                <i class="material-icons">design_services</i>
                                <p>{{ __('Tipo Articulos') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'articulo' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('articulos.index') }}">
                                <i class="material-icons">miscellaneous_services</i>
                                <p>{{ __('Articulos') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- <li class="nav-item{{ $activePage == 'proveedor' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('proveedores.index') }}">
                    <i class="material-icons">
                        transfer_within_a_station
                    </i>
                    <p>{{ __('Proveedores') }}</p>
                </a>
            </li> --}}


            {{-- <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
                <a class="nav-link" href="{{-- {{ route('typography') }} ">
            <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
            </a>
            </li>
            <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
                <a class="nav-link" href="{{-- {{ route('icons') }} ">
                    <i class="material-icons">bubble_chart</i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
                <a class="nav-link" href="{{-- {{ route('map') }} ">
                    <i class="material-icons">location_ons</i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
                <a class="nav-link" href="{{-- {{ route('notifications') }} ">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li> --}}
            {{-- <li class=" nav-item{{ $activePage == 'usuario' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('usuarios.index') }}">
                    <i class="material-icons">people_alt</i>
                    <p><b>{{ __('Usuarios') }}</b></p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#rolespermisos" aria-expanded="true">
                    <i><img style="width:25px" src="{{ asset('img/laravel.svg') }}"></i>
                    <p>{{ __('Roles y Permisos') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="rolespermisos">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'rol' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('roles.index') }}">
                                <i class="material-icons">supervisor_account</i>
                                <span class="sidebar-normal">{{ __('Roles') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <i class="material-icons">
                                    accessibility_new
                                </i>
                                <span class="sidebar-normal"> {{ __('Permisos') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            {{-- <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
                <a class="nav-link text-white bg-danger" href="{{-- {{ route('upgrade') }} ">
                    <i class="material-icons text-white">unarchive</i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
