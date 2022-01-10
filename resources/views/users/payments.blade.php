<x-layout title="{{'Pagos: '.$name}}">
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('users.payments', $user->id) }}"
               class="btn btn-danger text-white font-weight-bold shadow-sm me-4"
               @if (count($payments) <= 0) disabled @endif
            >
                <i class="bi bi-arrow-clockwise"></i>
                Limpiar busqueda
            </a>
        </div>

        <div class="col-md-4 d-flex align-items-center">
            <form action="{{route('users.payments', $user->id)}}" method="GET" class="bg-transparent p-0">
                <div class="input-group">
                    <label for="month" class="me-2">Buscar por mes</label>
                    <select id="month" name="month" class="form-control">
                        @foreach($months as $month)
                            <option value="{{ ++$loop->index }}"
                                @if($loop->index == request('month') ?? -1) selected @endif
                            >
                                {{ $month }}
                            </option>
                        @endforeach
                    </select>

                    <button class="btn bg-blue-gradient text-white">
                        <i class="bi bi-search"></i>
                        Buscar
                    </button>
                </div>
            </form>
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
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->concept }}</td>
                        <td>{{ $payment->date_made_payment }}</td>
                        <td>{{ $payment->identification }}</td>
                        <td>{{ $payment->exchange_rate }}</td>
                        <td>{{ $payment->currency }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <h4 class="text-muted text-center mt-4">
            No hay pagos registrados.
        </h4>
    @endif
</x-layout>
