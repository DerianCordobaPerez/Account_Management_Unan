@extends('layouts.app', ['title' => 'Gestión de roles'])

@section('content')
    {{Breadcrumbs::render()}}

    <div class="row">
        <div class="col-md-4 d-flex justify-content-start">
            <a href="{{ route('roles.create') }}" class="btn bg-blue-gradient btn-sm text-white mb-2 font-weight-bold shadow-sm">
                <i class="fas fa-plus"></i>
                Nuevo rol
            </a>
        </div>

        <div class="col-md-8 d-flex justify-content-end">
            <div class="input-group">
                <input class="form-control border-end-0 border" onsearch="resetTable('roles-table')" onkeyup="filterTable(this, 'roles-table')" id="search-payment-id" type="search" placeholder="Buscar por nombre del cliente">
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
                        <th scope="col">Asignaciones</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                @foreach($roles as $role)
                    <tr class="table-light">
                        <td class="fw-bold">#{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->users->count()}}</td>
                        <td>
                            <form class="bg-transparent p-0" action="{{route('roles.destroy', $role->id)}}" method="POST">
                                <a href="#" class="btn bg-blue-gradient btn-sm text-white mb-2 font-weight-bold shadow-sm">
                                    <i class="bi bi-plus-square"></i>
                                    Asignar
                                </a>

                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success btn-sm text-white mb-2 font-weight-bold shadow-sm">
                                    <i class="fas fa-pen"></i>
                                    Editar
                                </a>

                                @csrf @method('PUT')
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
    @endif
@endsection

@section('js')
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="{{asset('js/utils/filterTable.js')}}"></script>
@endsection
