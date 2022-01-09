<x-layout title="Roles eliminados">
    @if(count($roles) > 0)
        <div class="table-responsive mt-2">
            <table id="roles-table" class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" class="w-50">Acciones</th>
                </tr>
                </thead>

                @foreach($roles as $role)
                    <tr class="table-light">
                        <td class="fw-bold">#{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{route('roles.restore', $role->id)}}" method="POST" class="bg-transparent p-0">
                                    @csrf @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-sync"></i>
                                        Restaurar
                                    </button>
                                </form>

                                <form action="{{route('roles.force', $role->id)}}" method="POST" class="bg-transparent p-0">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                        Eliminar permanentemente
                                    </button>
                                </form>
                            </div>
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
</x-layout>
