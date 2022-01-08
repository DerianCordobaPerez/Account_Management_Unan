@extends('layouts.app', ['title' => 'Gestion de conceptos'])

@section('content')
    <div class="row">
        <div class="col-md-4 d-flex justify-content-start">
            <a href="{{ route('concepts.create') }}" class="btn bg-blue-gradient btn-sm text-white mb-2 font-weight-bold shadow-sm">
                <i class="fas fa-plus"></i>
                Nuevo concepto
            </a>
        </div>

        <div class="col-md-8 d-flex justify-content-end">
            <form action="{{route('concepts.index')}}" method="GET" class="bg-transparent p-0 w-100">
                <div class="input-group">
                    <input class="form-control border-end-0 border" name="search"
                           id="search-concept-id" type="search"
                           placeholder="Buscar concepto"
                           @if(count($concepts) <= 0) disabled @endif
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

    @if($concepts->count() > 0)
        <div class="table-responsive mt-2">
            <table id="concept-table" class="table table-striped table-bordered sortable align-middle">
                <tr class="bg-blue-gradient text-white">
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descripción</th>
                    <th class="w-25" scope="col">Acciones</th>
                </tr>

                @foreach($concepts as $concept)
                    <tr class="table-light">
                        <td class="fw-bold">#{{$concept->id}}</td>
                        <td>{{$concept->name}}</td>
                        <td>{{$concept->price}}</td>
                        <td>{{$concept->description}}</td>
                        <td>
                            <div class="d-flex justify-content-start gap-2">
                                <a href="{{ route('concepts.edit', $concept->id) }}" class="btn btn-sm btn-primary mr-2">
                                    <i class="fas fa-edit"></i>
                                    editar
                                </a>
                                <form class="p-0" action="{{ route('concepts.destroy', $concept->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                        Eliminar
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
            No hay coceptos agregados
        </h4>
    @endif
@endsection
