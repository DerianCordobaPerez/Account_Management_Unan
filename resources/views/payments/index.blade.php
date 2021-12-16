@extends('layouts.app', ['title' => "Historial de pagos"])

@section('content')
    @if(count($payments) > 0)
        <div class="row mt-4">
            @foreach($payments as $payment)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Concepto: {{$payment->concept}}</h5>
                        </div>

                        <div class="card-body">
                            <p>
                                <span class="fw-bold">Monto:</span>
                                {{$payment->amount}} Córdobas
                            </p>

                            <p>
                                <span class="fw-bold">Fecha:</span>
                                {{$payment->date_made_payment}}
                            </p>
                        </div>

                        <div class="card-footer w-100 text-center">
                            <a href="{{route('payments.show', $payment->id)}}">Ver detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex align-items-center justify-content-center">
                <a href="{{route('users.index')}}" class="btn btn-primary my-2">
                    <i class="bi bi-arrow-return-left"></i> Volver
                </a>
            </div>
        </div>
    @else
        <h4 class="text-muted text-center mt-4">
            No hay pagos registrados
        </h4>
    @endif
@endsection
