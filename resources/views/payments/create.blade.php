@extends('layouts.app', ['title' => 'Creación de Pago'])

@section('content')
    <div class="payments-form">
        <h2 class="title-form">Creacion de Pago</h2>
            <div class="content-payments">
                <form action="{{route('payments.store')}}" method="POST" class="form-register">
                    @csrf

                    <div class="form-register__body">
                        <!-- Step 1 -->
                        <div class="step active" id="step-1">
                            <div class="step__header bg-blue-gradient">
                                <h2 class="step__title">
                                    Información del Pago
                                    <small>(Paso 1)</small>
                                </h2>
                            </div>

                            <div class="step__body">
                                <!-- Concept field -->
                                <div class="mt-2">
                                    <x-form.select name="concept" id="concepts" key="name" label="Concepto" :options="$concepts" />
                                </div>

                                <!-- Amount field -->
                                <div class="mt-2">
                                    <x-form.input name="amount" id="amount" label="Monto" type="number" />
                                </div>

                                <!-- Amount in letters field -->
                                <div class="mt-2">
                                    <x-form.input name="amount_in_letters" id="amount_in_letters" label="Monto en letras" type="text" :disabled="true" />
                                </div>

                                <!-- Currency field -->
                                <x-form.select name="currency" id="currencies" key="name" label="Moneda" :options="$currencies" />
                            </div>

                            <div class="step__footer">
                                <button type="button" id="step-button-2" class="step__button step__button--next" data-to_step="2" data-step="1">Siguiente</button>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="step" id="step-2">
                            <div class="step__header bg-blue-gradient">
                                <h2 class="step__title">
                                    Información del Pago
                                    <small>(Paso 2)</small>
                                </h2>
                            </div>

                            <div class="step__body">
                                <x-form.input name="date_made_payment" id="date_made_payments" label="Fecha de realizacion" type="date" />

                                <div class="my-2">
                                    <x-form.input name="payment_registration_date" id="payment_registration_dates" label="Fecha de registro" type="date" />
                                </div>

                                <div class="my-2">
                                    <label for="observations" class="form-label fw-bold">Observación</label>
                                    <textarea class="form-control" name="observation" id="observations" rows="3" required></textarea>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <x-form.input name="payment_received" id="payment_received" label="Por quién se recibió" type="text" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-form.input name="account_is_payment" id="account_is_payment" label="Por cuenta de quién" type="text" />
                                    </div>
                                </div>
                            </div>

                            <div class="step__footer">
                                <button type="button" id="step-button-back-1" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>
                                <button type="button" id="step-button-3" class="step__button step__button--next" data-to_step="3" data-step="2">Siguiente</button>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="step" id="step-3">
                            <div class="step__header bg-blue-gradient">
                                <h2 class="step__title">
                                    Información del Pago
                                    <small>(Paso 3)</small>
                                </h2>
                            </div>

                            <div class="step__body">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-form.input name="identification" id="identification" label="Identificación / RUC" type="text" />
                                        </div>

                                        <div class="col-md-6">
                                            <x-form.input name="receipt_number" id="receipt_number" label="Número de recibo" type="text" />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <x-form.input name="pay_time" id="pay_time" label="Hora en el que se efectuó el pago" type="time" />
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-form.input name="cashier" id="cashier" label="Cajero que registró el pago" type="text" />
                                        </div>

                                        <div class="col-md-6">
                                            <x-form.input name="cashier_identification" id="cashier_identification" label="Identificador del cajero" type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step__footer">
                                <button type="button" class="step__button step__button--back" data-to_step="2" data-step="3">Regresar</button>
                                <button type="submit" id="button-finish" class="step__button">Finalizar</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="result-form w-100 ms-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-sm align-middle">
                            <tr class="bg-blue-gradient text-white">
                                <th scope="col">Campos</th>
                                <th scope="col">Contenido</th>
                            </tr>

                            @foreach($table as $td)
                                <tr class="{{$td['class']}}" @if($td['hidden']) hidden @endif>
                                    <td class="fw-bold">
                                        {{$td['name']}}
                                    </td>
                                    <td id="{{$td['id']}}"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section("js")
    <script src="{{asset('js/utils/convertNumberToWord.js')}}"></script>
    <script src="{{ asset('js/utils/multipleForm.js') }}"></script>
    <script src="{{asset('js/utils/createTablePayments.js')}}"></script>
@endsection
