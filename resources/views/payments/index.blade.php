@extends('layouts.app', ['title' => "Historial de pagos"])

@section('content')
    <div class="row">
        <div class="col-md-4 d-flex justify-content-start">
            <a href="{{ route('payments.create') }}" class="btn bg-blue-gradient btn-sm text-white mb-2 font-weight-bold shadow-sm">
                <i class="fas fa-plus"></i>
                Nuevo recibo de pago
            </a>
        </div>

        <div class="col-md-8 d-flex justify-content-end">
            <div class="input-group">
                <input class="form-control border-end-0 border" onkeyup="filterTable()" id="search-payment-id" type="search" placeholder="Buscar por número de factura">
                <span class="input-group-append">
                    <button class="btn bg-white border-start-0 border-bottom-0 border ms-n5" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>

    @if(count($payments) > 0)
        <div class="table-responsive mt-2">
            <table id="payment-table" class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                    <tr>
                        <th scope="col">Numero de pago</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Fecha de registro</th>
                        <th scope="col">Moneda</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                @foreach($payments as $payment)
                    <tr class="table-light">
                        <td class="fw-bold">#{{$payment->id}}</td>
                        <td>{{$payment->user->names}}</td>
                        <td>{{$payment->payment_registration_date}}</td>
                        <td>{{$payment->currency}}</td>
                        <td>{{$payment->amount}}</td>
                        <td>
                            <a class="btn bg-blue-gradient text-white btn-sm" href="{{route('payments.show', $payment->id)}}">
                                <i class="bi bi-printer"></i>
                                Imprimir
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <h4 class="text-muted text-center mt-4">
            No hay pagos registrados
        </h4>
    @endif
@endsection

@section('js')
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="{{asset('js/utils/filterTable.js')}}"></script>
@endsection
