@extends('layouts.app', ['title' => 'Gestión de usuarios'])

@section('content')
    {{Breadcrumbs::render()}}

    <div class="row">
        <div class="col-md-4">
            <a href="{{route('users.index')}}"
               class="btn btn-danger text-white font-weight-bold shadow-sm me-4"
               @if(count($users) <= 0) disabled @endi
            >
                <i class="bi bi-arrow-clockwise"></i>
                Limpiar busqueda
            </a>
        </div>

        <div class="col-md-8">
            <form action="{{route('users.index')}}" method="GET" class="p-0 bg-transparent">
                <div class="input-group">
                    <input class="form-control border-end-0 border"
                           id="search" name="search" type="search"
                           placeholder="Buscar por identificación, nombre, apellido, teléfono o correo"
                           @if(request('search') !== null) value="{{request('search')}}" @endif
                    >
                    <span class="input-group-append">
                        <button class="btn bg-white border-start-0 border-bottom-0 border ms-n5" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    @if(count($users) > 0)
        <div class="table-responsive mt-2">
            <table id="users-table" class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                    <tr>
                        <th scope="col">Identificación</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                @foreach($users as $user)
                    <tr class="table-light">
                        <td>{{$user->identification}}</td>
                        <td>{{$user->names}}</td>
                        <td>{{$user->lastnames}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="{{
                                route($user->active ? 'users.disable' : 'users.enable', $user->id)
                            }}" method="POST" class="bg-transparent p-0">
                                @csrf
                                <a href="{{route('users.payments', $user->id)}}" class="btn btn-success btn-sm">
                                    <i class="bi bi-credit-card-2-front"></i>
                                    Pagos
                                </a>

                                <button type="submit" class="btn btn-{{$user->active ? 'danger' : 'secondary'}} btn-sm">
                                    @if($user->active)
                                        <i class="bi bi-lock-fill"></i>
                                        Deshabilitar
                                    @else
                                        <i class="bi bi-unlock-fill"></i>
                                        Habilitar
                                    @endif
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    @else
        <p>No hay usuarios registrados</p>
    @endif
@endsection
