<!-- navbar start -->
<nav class="navbar navbar-expand-sm p-0 m-0">
    <div class="container-fluid px-4">
        <h3 class="navbar-brand title-bar">
            <img src="{{ asset('img/Logo.png')}}" alt="" width="25">
            Unan Leon
        </h3>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ms-auto mb-2 mb-lg-0">
                <li class="nav-item navbar-option" style="height: 100%">
                    <a class="nav-link" aria-current="true" href="{{route('home')}}">
                        <i class="bi bi-house"></i>
                        Inicio
                    </a>
                </li>

                <li class="nav-item navbar-option" style="height: 100%">
                    <a class="nav-link" aria-current="true" href="{{route('users.index')}}">
                        <i class="bi bi-person-circle"></i>
                        Usuarios
                    </a>
                </li>

                <!-- Option registros -->
                <li class="nav-item dropdown navbar-option">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="bi bi-list-check"></i>
                        Registros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">option 1</a></li>
                        <li><a class="dropdown-item" href="#">option 2</a></li>
                        <li><a class="dropdown-item" href="#">option 3</a></li>
                        <li><a class="dropdown-item" href="#">option 4</a></li>
                    </ul>
                </li>

                <!-- Option herramientas -->
                <li class="nav-item dropdown navbar-option">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="bi bi-list-check"></i>
                        Herramientas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Roles</a></li>
                        <li><a class="dropdown-item" href="#">Definir Conceptos</a></li>
                    </ul>
                </li>

                <!-- User profile -->
                <li class="nav-item dropdown navbar-option me-5">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="bi bi-list-check"></i>
                        {{auth()->user()->names}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Cambiar contraseña</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-power"></i>
                                Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
