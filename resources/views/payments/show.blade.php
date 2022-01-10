<x-layout title="{{ 'Pago ' . $payment->user->names }}">
    <div class="container row bg-light m-2 p-2">
        <h2 class="title-form"> {{ 'Pago ' . $payment->user->names }} </h2>
        <h4 class="data-form">
            <i class="bi bi-caret-down-fill"></i>
            Datos Generales
        </h4>
        <hr>

        <div class="col-md-6 text-blue">
            <img src="{{ asset('img/logos/UNAN.png') }}" class="logo-style m-0 p-0 mb-2" alt="logo" />

            <p> Nombre: {{ $payment->user->names }} {{ $payment->user->lastnames }}</p>
            <p> Email: {{ $payment->user->email }}</p>
            <p> Identificación: {{ $payment->user->identification }}</p>
            <p> Telefono: {{ $payment->user->phone }}</p>
            <p> Municipio: {{ $payment->user->municipality }}</p>
        </div>

        <div class="col-md-6 ">
            <div class="d-flex justify-content-end">
                <table class="table w-75 table-striped table-bordered sortable">
                    <thead class="bg-blue-gradient text-white">
                        <tr>
                            <th scope="col">Numero de pago {{ $payment->receipt_number }}</th>
                        </tr>
                    </thead>
                    <tr class="table-light">
                        <td class="text-blue">Monto pagado: {{ $payment->amount }}</td>
                    </tr>
                    <tr class="table-light">
                        <td class="text-blue">Tipo de moneda: {{ $payment->currency }}</td>
                    </tr>
                </table>
            </div>

            <table class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                    <tr>
                        <th scope="col">Datos de registro</th>
                    </tr>
                </thead>
                <tr class="table-light">
                    <td class="text-blue">Fecha de pago: {{ $payment->date_made_payment }}</td>
                </tr>
                <tr class="table-light">
                    <td class="text-blue">Fecha de registro: {{ $payment->payment_registration_date }}</td>
                </tr>
                <tr class="table-light">
                    <td class="text-blue">{{ $payment->account_is_payment }}</td>
                </tr>
            </table>

        </div>
        <div class="container-fluid">
            <table class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                    <tr class="text-center">
                        <th scope="col" colspan="5">Detalles de los componentes del pago
                            {{ $payment->receipt_number }}</th>
                    </tr>
                    <tr>
                        <th scope="col">Concepto</th>
                        <th scope="col">Periodos</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">I.V.A</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tr class="table-light size-td" valign="top">
                    <td>{{ $payment->concept }}</td>
                    <td>{{ $payment->payment_registration_date }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>0.0</td>
                    <td>{{ $payment->amount }}</td>
                </tr>
                <tr class="bg-blue-gradient text-white">
                    <th scope="col" colspan="2">Subtotales de los cargos del mes actual</th>
                    <th scope="col">{{ $payment->amount }}</th>
                    <th scope="col">0.0</th>
                    <th scope="col">{{ $payment->amount }}</th>
                </tr>
            </table>
        </div>
    </div>
</x-layout>
