@extends('layouts.app', ['title' => 'Gestión de usuarios'])

@section('content')
    {{Breadcrumbs::render()}}

    <div class="input-group">
        <input class="form-control border-end-0 border"
            id="search" name="search" type="text"
            placeholder="Buscar por nombre del usuario"
        >
        <span class="input-group-append">
            <button class="btn bg-white border-start-0 border-bottom-0 border ms-n5" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>

    @if(count($users) > 0)
        <div class="table-responsive mt-2">
            <table id="users-table" class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                    <tr>
                        <th scope="col">Correo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                    <tr class="table-light">
                        <td>
                            {{$user->email}}
                        </td>

                        <td>
                            {{$user->names}}
                        </td>

                        <td>
                            <a href="{{route('users.show', $user->id)}}" class="btn bg-blue-gradient text-white">
                                <i class="bi bi-pencil"></i>
                                Ver
                            </a>

                            <a href="{{route('users.payments', $user->id)}}" class="btn btn-success">
                                <i class="bi bi-credit-card-2-front"></i>
                                Pagos
                            </a>
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
