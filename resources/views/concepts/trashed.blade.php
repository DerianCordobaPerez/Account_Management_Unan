@extends('layouts.app', ['title' => 'Gestion de conceptos'])

@section('content')
    @if($concepts->count() > 0)
        <div class="table-responsive mt-2">
            <table id="concept-table" class="table table-striped table-bordered sortable align-middle">
                <tr class="bg-blue-gradient text-white">
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descripción</th>
                    <th class="w-50" scope="col">Acciones</th>
                </tr>

                @foreach($concepts as $concept)
                    <tr class="table-light">
                        <td class="fw-bold">#{{$concept->id}}</td>
                        <td>{{$concept->name}}</td>
                        <td>{{$concept->price}}</td>
                        <td>
                            @if(strlen($concept->description) > 0)
                                {{$concept->description}}
                            @else
                                <span class="text-muted">No contiene ninguna descripción</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{route('concepts.restore', $concept->id)}}" method="POST" class="bg-transparent p-0">
                                    @csrf @method('PUT')
                                    <button class="btn btn-success btn-sm border-0" type="submit">
                                        <i class="fas fa-undo"></i>
                                        Restaurar
                                    </button>
                                </form>

                                <form class="p-0" action="{{ route('concepts.force', $concept->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
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
            No hay coceptos eliminados
        </h4>
    @endif
@endsection

