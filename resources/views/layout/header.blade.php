<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">

        @yield('title')

        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->profile_pic == null)
                        <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=retro&s=80' }}"
                            alt="user">
                    @else
                        <div
                            class="d-flex justify-content-center align-items-center bg-primary rounded-circle overflow-hidden">
                            <img src="{{ asset('back/img/users/' . Auth::user()->profile_pic) }}" alt="profile">
                        </div>
                    @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            @if (Auth::user()->profile_pic == null)
                                <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=retro&s=80' }}"
                                    alt="user">
                            @else
                                <div class="d-flex justify-content-center align-items-center bg-primary rounded-circle">
                                    <img src="{{ asset('back/img/users/' . Auth::user()->profile_pic) }}"
                                        alt="profile">
                                </div>
                            @endif
                        </div>
                        <div class="info text-center">
                            <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                            <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            {{-- 
                              @role('customer')
                                <li class="nav-item">
                                    <a href="{{ url('/general/profile') }}" class="nav-link">
                                        <i data-feather="user"></i>
                                        <span>Perfil</span>
                                    </a>
                                </li>
                            @endrole
                             --}}
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i data-feather="edit"></i>
                                    <span>Editar Perfil</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i>
                                    <span>Cerrar Sesión</span>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</nav>
