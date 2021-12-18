@extends('layouts.app', ['title' => 'Panel principal'])

@section('content')
    <div class="row">
        <!-- User information card -->
        <div class="col-md-6">
            <x-card title="Información del usuario">
                <ul class="list-unstyled">
                    <li><span class="text-blue">Nombre:</span> {{ auth()->user()->names }}</li>
                    <li><span class="text-blue">Email:</span> {{ auth()->user()->email }}</li>
                </ul>
            </x-card>

            <!-- Payments for month card -->
            <div class="mt-4">
                <x-card title="Historial de facturas">
                    <x-accordion>
                        <x-accordion-tab title="Diciembre 2021">
                            <ul class="list-unstyled">
                                <li class="fw-bold">29 Diciembre 2021</li>
                                <li>C$ 390.09</li>
                            </ul>
                            <a href="#" class="text-info">
                                <i class="bi bi-download"></i>
                                Ver factura
                            </a>
                        </x-accordion-tab>

                        <x-accordion-tab title="Noviembre 2021">
                            <ul class="list-unstyled">
                                <li class="fw-bold">29 Noviembre 2021</li>
                                <li>C$ 489.36</li>
                            </ul>
                            <a href="#" class="text-info">
                                <i class="bi bi-download"></i>
                                Ver factura
                            </a>
                        </x-accordion-tab>

                        <x-accordion-tab title="Octubre 2021">
                            <ul class="list-unstyled">
                                <li class="fw-bold">29 Octubre 2021</li>
                                <li>C$ 4390.99</li>
                            </ul>
                            <a href="#" class="text-info">
                                <i class="bi bi-download"></i>
                                Ver factura
                            </a>
                        </x-accordion-tab>
                    </x-accordion>

                    <x-slot name="footer">
                        <a class="text-blue" href="{{route('users.payments', auth()->user()->id)}}">
                            Ver todas
                        </a>
                    </x-slot>
                </x-card>
            </div>
        </div>

        <!-- Last bill card -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8">
                    <form class="d-flex justify-content-start">
                        <div class="input-group mb-4 w-100">
                            <input type="email" class="form-control" placeholder="Barra de busqueda"/>
                            <span class="input-group-btn">
                                <button class="btn bg-blue-gradient" type="submit">
                                    <i class="bi bi-search text-white"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="d-flex justify-content-end">
                        <p class="fw-bold">Tasa de cambio: {{$exchangeRate}}</p>
                    </div>
                </div>
            </div>

            <x-card title="Ultima factura">
                <div class="amount mb-3">
                    <h2 class="text-blue fs-1">C$ 2,162.87</h2>
                </div>

                <div class="row">
                    <div class="col-md-6 text-blue">
                        <p>Numero de Factura</p>
                        <p>Fecha de Facturación</p>
                        <p>Fecha de Pago</p>
                        <p>Periodo</p>
                        <p>Estado</p>
                    </div>

                    <div class="col-md-6">
                        <p>51626</p>
                        <p>01/01/2022</p>
                        <p>28/01/2022</p>
                        <p>Enero 2022</p>
                        <p class="text-danger">Pendiente</p>
                    </div>
                </div>

                <x-slot name="footer">
                    <a href="#" class="text-blue">Ver factura</a>
                </x-slot>
            </x-card>
        </div>
    </div>
@endsection
