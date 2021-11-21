<!-- navbar start -->
<nav class="navbar navbar-light bg-light navbar-expand-lg d-flex">
    <div class="container-fluid mx-4">
        <h3 class="navbar-brand title-bar">
            Unan Leon
            <i class="bi bi-github"></i>
        </h3>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex align-items-end flex-column" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item me-2">
                    <a class="nav-link text-dark" aria-current="true" href="{{route('home')}}">
                        <i class="bi bi-house"></i>
                        Inicio
                    </a>
                </li>

                <!-- Option 1 dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

                <li class="nav-item me-2">
                    <a class="nav-link text-dark" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-power"></i>
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>
