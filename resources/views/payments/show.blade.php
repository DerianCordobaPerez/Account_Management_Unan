<x-layout title="Estado de cuenta">
    <div class="container row bg-light m-2 p-2">
        <h2 class="title-form">Estado de cuenta</h2>
        <h4 class="data-form">
            <i class="bi bi-caret-down-fill"></i>
            Datos Generales
        </h4>
        <hr>

        <div class="col-md-6">
            <img src="{{ asset('img/logos/UNAN.png') }}" class="logo-style m-0 p-0 mb-2" alt="logo"/>

            <p>
                <span class="fw-bold">Nombre: </span>
                {{ $payment->user->names }} {{ $payment->user->lastnames }}
            </p>

            <p>
                <span class="fw-bold">Email:</span>
                {{ $payment->user->email }}
            </p>

            <p>
                <span class="fw-bold">Identificación:</span>
                {{ $payment->user->identification }}
            </p>

            <p>
                <span class="fw-bold">Telefono:</span>
                {{ $payment->user->phone }}
            </p>

            <p>
                <span class="fw-bold">Municipio:</span>
                {{ $payment->user->municipality }}
            </p>
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
                    <td class="text-blue">{{ $payment->concept }}</td>
                    <td class="text-blue">{{ $payment->payment_registration_date }}</td>
                    <td class="text-blue">{{ $payment->amount }}</td>
                    <td class="text-blue">0.0</td>
                    <td class="text-blue">{{ $payment->amount }}</td>
                </tr>
                <tr class="bg-blue-gradient text-white">
                    <th scope="col" colspan="2">Subtotales de los cargos del pago actual</th>
                    <th scope="col">{{ $payment->amount }}</th>
                    <th scope="col">0.0</th>
                    <th scope="col">{{ $payment->amount }}</th>
                </tr>
            </table>
        </div>

        <div class="d-flex align-items-end flex-column">

            <div class="d-flex justify-content-between flex-column">
                <h5 class="text-blue">Monto final pagado</h5>
                <div class="input-group mb-4">
                        <span class="input-group-text bg-blue-gradient text-white">Total en
                            {{ $payment->currency }}</span>
                    <input type="text" class="form-control table-light text-blue" value="{{ $payment->amount }}"
                           readonly>
                </div>
            </div>
            <p class="m-0 text-blue">Facultad de Ciencias Economicas</p>
            <p class="text-blue">y Empresariales UNAN-LEON</p>
        </div>
    </div>

</x-layout>


