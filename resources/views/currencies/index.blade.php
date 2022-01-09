@extends('layouts.app', ['title' => 'Gestión de monedas'])

@section('content')
    <div class="row">
        <div class="col-md-4 d-flex justify-content-start">
            <a href="{{ route('currencies.create') }}" class="btn bg-blue-gradient btn-sm text-white mb-2 font-weight-bold shadow-sm">
                <i class="fas fa-plus"></i>
                Agregar nueva
            </a>
        </div>

        <div class="col-md-8 d-flex justify-content-end">
            <div class="input-group">
                <input class="form-control border-end-0 border" onsearch="resetTable('currency-table')"
                       onkeyup="filterTable(this, 'currency-table')" id="search-payment-id" type="search"
                       placeholder="Buscar por nombre de la moneda"
                        @if(count($currencies) <= 0) disabled @endif
                >
                <span class="input-group-append">
                    <button class="btn bg-white border-start-0 border-bottom-0 border ms-n5" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>

    @if(count($currencies) > 0)
        <div class="table-responsive mt-2">
            <table id="currency-table" class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Abreviación</th>
                        <th scope="col">País</th>
                        <th class="w-25" scope="col">Acciones</th>
                    </tr>
                </thead>

                @foreach($currencies as $currency)
                    <tr class="table-light">
                        <td class="fw-bold">#{{$currency->id}}</td>
                        <td>{{$currency->name}}</td>
                        <td>{{$currency->abbreviation}}</td>
                        <td>{{$currency->country}}</td>
                        <td>
                            <div class="d-flex justify-content-start gap-2">
                                <a href="{{ route('currencies.edit', $currency->id) }}" class="btn btn-sm btn-primary mr-2">
                                    <i class="fas fa-edit"></i>
                                    editar
                                </a>
                                <form class="p-0"
                                      action="{{ route($currency->is_active ? 'currencies.disable' : 'currencies.enable', $currency->id) }}"
                                      method="POST"
                                >
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-{{$currency->is_active ? 'danger' : 'secondary'}}">
                                        @if($currency->is_active)
                                            <i class="bi bi-lock-fill"></i>
                                            Deshabilitar
                                        @else
                                            <i class="bi bi-unlock-fill"></i>
                                            Habilitar
                                        @endif
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
            No hay monedas agregadas
        </h4>
    @endif
@endsection

@section('js')
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="{{asset('js/utils/filterTable.js')}}"></script>
@endsection
