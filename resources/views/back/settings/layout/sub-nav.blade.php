@section('subnav')
    <div class="sub-nav">
        <div class="s-nav">
            <div class="d-flex align-items-center mb-4">
                <div class="title-icon">
                    <i class="link-icon" data-feather="toggle-left"></i>
                </div>
                <h4>Configuración</h4>
            </div>
            <ul style="list-style: none">
                <li class="sub-item">
                    <a class="sub-link {{ active_class(['panel/configuracion']) }}" href="{{ route('admin.settings') }}">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Mi información</span>
                    </a>
                </li>

                @if (Auth::user()->hasRole(['client_master', 'webmaster', 'supplier_master', 'client_admin', 'admin', 'supplier_admin']))
                    <li class="sub-item">
                        <a class="sub-link {{ active_class(['panel/configuracion/usuarios_y_permisos']) }}"
                            href="{{ route('admin.users') }}">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">Usuarios y Permisos</span>
                        </a>
                    </li>
                @endif

                <li class="sub-item">
                    <a class="sub-link {{ active_class(['panel/configuracion']) }}" href="{{ route('admin.settings') }}">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">SEO</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="title-content sub-nav-r ">
        <div class="d-flex align-items-center">
            <div class="title-icon">
                <i class="link-icon" data-feather="toggle-left"></i>
            </div>
            <h5>Configuración</h5>
        </div>
    </div>
@endsection
