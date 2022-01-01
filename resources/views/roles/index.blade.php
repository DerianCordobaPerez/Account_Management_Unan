@extends('layouts.app', ['title' => 'Gestión de roles'])

@section('content')
    {{Breadcrumbs::render()}}

    <div class="row">
        <div class="col-md-2 d-flex justify-content-start">
            <a href="{{ route('roles.create') }}" class="btn bg-blue-gradient btn-sm text-white mb-2 font-weight-bold shadow-sm">
                <i class="fas fa-plus"></i>
                Nuevo rol
            </a>
        </div>

        <div class="col-md-2 d-flex justify-content-center">
            <button type="button" class="btn btn-success btn-sm text-white mb-2 font-weight-bold shadow-sm"
                    data-bs-toggle="modal" data-bs-target="#modal-assigment-roles"
                    @if(count($roles) <= 0) disabled @endif
            >
                <i class="fas fa-sync"></i>
                Gestionar roles
            </button>
        </div>

        <div class="col-md-8 d-flex justify-content-end">
            <div class="input-group">
                <input class="form-control border-end-0 border" onsearch="resetTable('roles-table')"
                       onkeyup="filterTable(this, 'roles-table')" id="search-payment-id"
                       type="search" placeholder="Buscar por nombre del rol"
                       @if(count($roles) <= 0) disabled @endif
                >
                <span class="input-group-append">
                    <button class="btn bg-white border-start-0 border-bottom-0 border ms-n5" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>

    @if(count($roles) > 0)
        <div class="table-responsive mt-2">
            <table id="roles-table" class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Privilegios</th>
                        <th scope="col">Asignaciones</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                @foreach($roles as $role)
                    <tr class="table-light">
                        <td class="fw-bold">#{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->privileges->count()}}</td>
                        <td>{{$role->users->count()}}</td>
                        <td>
                            <form class="bg-transparent p-0" action="{{route('roles.destroy', $role->id)}}" method="POST">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success btn-sm text-white mb-2 font-weight-bold shadow-sm">
                                    <i class="fas fa-pen"></i>
                                    Editar
                                </a>

                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm text-white mb-2 font-weight-bold shadow-sm">
                                    <i class="bi bi-trash"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <x-modal id="modal-assigment-roles"
                 title="Seleccione el usuario"
                 class="fade shadow-lg"
                 :scrollable="true"
        >
            <x-slot name="body">
                <ul class="d-flex flex-column gap-2 unstyled-list mt-2">
                    @foreach($users as $user)
                        <li class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div>
                                    <span class="fw-bold">{{ $user->names }}</span>
                                    <span class="text-muted">{{ $user->email }}</span>
                                </div>
                            </div>
                            <div>
                                <a href="{{route('users.assign.role', $user->id)}}" class="btn btn-sm btn-success text-white font-weight-bold shadow-sm">
                                    <i class="bi bi-tools"></i>
                                    Gestionar
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </x-slot>
        </x-modal>
    @else
        <h4 class="text-muted text-center mt-4">
            No hay roles registrados.
        </h4>
    @endif
@endsection

@section('js')
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="{{asset('js/utils/filterTable.js')}}"></script>
@endsection
