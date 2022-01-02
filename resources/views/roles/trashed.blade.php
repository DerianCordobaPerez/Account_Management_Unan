@extends('layouts.app', ['title' => 'Roles eliminados'])

@section('content')
    @if(count($roles) > 0)
        <div class="table-responsive mt-2">
            <table id="roles-table" class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col" class="w-25">Acciones</th>
                    </tr>
                </thead>

                @foreach($roles as $role)
                    <tr class="table-light">
                        <td class="fw-bold">#{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            <a href="{{route('roles.restore', $role->id)}}" class="btn btn-success btn-sm text-white mb-2 font-weight-bold shadow-sm">
                                <i class="fas fa-sync"></i>
                                Restaurar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <h4 class="text-muted text-center mt-4">
            No hay roles eliminados.
        </h4>
    @endif
@endsection
