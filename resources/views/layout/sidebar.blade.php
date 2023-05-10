<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('index') }}" class="sidebar-brand">
            <img src="{{ asset('img/logo/d_blue.png') }}" height="40px" alt="">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Menú</li>
            <li class="nav-item ">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Vista General</span>
                </a>
            </li>

            <li class="nav-item nav-category">RH</li>
            <li class="nav-item ">
                <a href="{{ route('jobs.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="archive"></i>
                    <span class="link-title">Vacantes</span>
                </a>
            </li>

            <li class="nav-item nav-category">Marketing</li>
            <li class="nav-item ">
                <a href="{{ route('banners.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="hexagon"></i>
                    <span class="link-title">Banners</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('campaings.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="key"></i>
                    <span class="link-title">Campañas</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('comments.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-circle"></i>
                    <span class="link-title">Reseñas</span>
                </a>
            </li>

            <li class="nav-item nav-category">Contactos</li>
            <li class="nav-item ">
                <a href="{{ route('companies.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="briefcase"></i>
                    <span class="link-title">Empresas</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('people.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="coffee"></i>
                    <span class="link-title">Postulados</span>
                </a>
            </li>

            <li class="nav-item nav-category"></li>
            <li class="nav-item ">
                <a href="{{ route('admin.system') }}" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Configuración</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="https://derch.gitbook.io/derch-web/" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Documentación</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">Cerrar Sesión</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        </ul>
    </div>
</nav>
