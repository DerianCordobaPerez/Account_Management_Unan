<x-layout :title="$title">
    <div class="row">
        <!-- User information card -->
        <div class="col-md-6">
            <x-card title="Información del usuario">
                <ul class="list-unstyled">
                    <li><span class="text-blue">Nombre:</span> {{ auth()->user()->names ?? '' }}</li>
                    <li><span class="text-blue">Email:</span> {{ auth()->user()->email ?? '' }}</li>
                </ul>
            </x-card>

            <!-- Payments for month card -->
            <div class="mt-4">
                <x-card title="Historial de facturas">
                    <x-accordion>
                        @if($totalAmountByMonth)
                            @foreach($totalAmountByMonth as $amount)
                                <x-accordion-tab title="{{$periods[$loop->index]}}">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span class="text-blue">Monto total:</span>
                                            <span class="fw-bold">{{ $amount }}</span>
                                        </li>
                                    </ul>
                                </x-accordion-tab>
                            @endforeach
                        @else
                            <div class="text-center text-gray-500 text-sm">
                                <h3>No hay pagos registradas</h3>
                                <h5>Durante los ultimos 3 meses</h5>
                            </div>
                        @endif
                    </x-accordion>

                    <x-slot name="footer">
                        <a class="text-blue" href="{{ route('users.payments', auth()->user()->id) }}">
                            Ver todas
                        </a>
                    </x-slot>
                </x-card>
            </div>
        </div>

        <!-- Last bill card -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5">
                    <div class="d-flex justify-content-center align-middle px-2 rounded-3 bg-light pt-2 pb-0 text-center">
                        <p class="fw-bold text-blue">
                            <i class="bi bi-info-circle"></i>
                            Cambio dolar: {{$exchangeRate}}
                        </p>
                    </div>
                </div>

                <div class="col-md-7 d-flex justify-content-end">
                    <form class="bg-transparent p-0">
                        <div class="input-group mb-4 w-100">
                            <label>
                                <input type="email" class="form-control" placeholder="Barra de busqueda"/>
                            </label>
                            <span class="input-group-btn">
                                <button class="btn bg-blue-gradient" type="submit">
                                    <i class="bi bi-search text-white"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <x-card title="Ultimo pago">
                @isset($latestPayment)
                    <div class="mb-3">
                        <h2 class="text-blue fs-1">C$ {{$latestPayment->amount}}</h2>
                    </div>

                    <div class="row">
                        <div class="col-md-6 text-blue">
                            <p>Numero de pago</p>
                            <p>Fecha de Pago</p>
                            <p>Fecha de registro</p>
                            <p>Periodo</p>
                            <p>Estado</p>
                        </div>

                        <div class="col-md-6">
                            <p>{{$latestPayment->receipt_number}}</p>
                            <p>{{$latestPayment->date_made_payment}}</p>
                            <p>{{$latestPayment->payment_registration_date}}</p>
                            <p>{{$period}}</p>
                            <p class="text-{{$latestPayment->status === 'Pendiente' ? 'danger' : 'success'}}">
                                {{$latestPayment->status}}
                            </p>
                        </div>
                    </div>

                    <x-slot name="footer">
                        <a href="{{route('payments.show', $latestPayment->id)}}" class="text-blue">Ver factura</a>
                    </x-slot>
                @else
                    <div class="text-center text-gray-500 text-sm">
                        <h3>No se ha realizado níngun recibo de pago</h3>
                        <h5>Al realizar un pago bajo cualquier concepto se mostrara como ultimo recibo de pago</h5>
                    </div>
                @endisset
            </x-card>
        </div>
    </div>
</x-layout>
