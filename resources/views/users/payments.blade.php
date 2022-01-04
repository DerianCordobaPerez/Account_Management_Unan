@extends('layouts.app', ['title' => 'Pagos: '.$name])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('users.payments', auth()->user()->id) }}"
                class="btn btn-danger text-white font-weight-bold shadow-sm me-4" 
                @if (count($payments) <= 0) disabled @endif
            >
                <i class="bi bi-arrow-clockwise"></i>
                Limpiar busqueda
            </a>
        </div>

        <div class="col-md-4 d-flex align-items-center">
            <div class="input-group">
                <label class="me-2">Buscar por mes</label>
                <select class="form-control">
                    <option>Todos</option>  
                    <option>Diciembre</option>
                    <option>Noviembre</option>
                    <option>Septiembre</option>
                </select>
            </div>
        </div>
    </div>

    @if (count($payments) > 0)
        <div class="table-responsive mt-2">
            <table id="users-table" class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                    <tr>
                        <th scope="col">Monto</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Identificación</th>
                        <th scope="col">Tasa de cambio</th>
                        <th scope="col">Moneda</th>
                    </tr>
                </thead>
                @foreach ($payments as $payment)
                    <tr class="table-light">
                        <th>{{ $payment->amount }}</th>
                        <th>{{ $payment->concept }}</th>
                        <th>{{ $payment->date_made_payment }}</th>
                        <th>{{ $payment->identification }}</th>
                        <th>{{ $payment->exchange_rate }}</th>
                        <th>{{ $payment->currency }}</th>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <h4 class="text-muted text-center mt-4">
            No hay pagos registrados.
        </h4>
    @endif
@endsection
