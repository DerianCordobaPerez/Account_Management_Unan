<!-- navbar start -->
<nav class="navbar navbar-expand-sm p-0 m-0">
    <div class="container-fluid px-4 w">
        <h3 class="navbar-brand title-bar">
            Unan Leon
            <img src="{{ asset('img/Logo.png')}}" alt="" width="25">
        </h3>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ms-auto mb-2 mb-lg-0">
               
                @guest
                    <li class="nav-item me-2">
                        <a class="nav-link text-dark" aria-current="true" href="{{route('login')}}">
                            <i class="bi bi-door-open"></i>
                            Iniciar Sesion
                        </a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item navbar-option" style="height: 100%">
                        <a class="nav-link" aria-current="true" href="{{route('home')}}">
                            <i class="bi bi-house"></i>
                            Inicio
                        </a>
                    </li>

                        <!-- Option 1 dropdown -->
                    <li class="nav-item dropdown navbar-option">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-list-check"></i>
                            Opciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">option 1</a></li>
                            <li><a class="dropdown-item" href="#">option 2</a></li>
                            <li><a class="dropdown-item" href="#">option 3</a></li>
                            <li><a class="dropdown-item" href="#">option 4</a></li>
                        </ul>
                    </li>

                    <!-- Option 2 dropdown -->
                    <li class="nav-item dropdown navbar-option">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-list-check"></i>
                            Opciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">option 1</a></li>
                            <li><a class="dropdown-item" href="#">option 2</a></li>
                            <li><a class="dropdown-item" href="#">option 3</a></li>
                            <li><a class="dropdown-item" href="#">option 4</a></li>
                        </ul>
                    </li>

                    <!-- Option 3 dropdown -->
                    <li class="nav-item dropdown navbar-option">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-list-check"></i>
                            Opciones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">option 1</a></li>
                            <li><a class="dropdown-item" href="#">option 2</a></li>
                            <li><a class="dropdown-item" href="#">option 3</a></li>
                            <li><a class="dropdown-item" href="#">option 4</a></li>
                        </ul>
                    </li>

                    <li class="nav-item me-2 navbar-option">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-power"></i>
                            Cerrar sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth
               
            </ul>

        </div>
    </div>
</nav>
