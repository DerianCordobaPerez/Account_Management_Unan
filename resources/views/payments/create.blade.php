@extends('layouts.app', ['title' => 'Creación de Pago'])

@section('content')
    <div class="payments-form">
    <h2 class="title-form">Creacion de Pago</h2>
        <div class="content-payments">
        <form action="" class="form-register">
            <div class="form-register__body">
                <div class="step active" id="step-1">
                    <div class="step__header bg-blue-gradient">
                        <h2 class="step__title">
                            Información de cuenta
                            <small>(Paso 1)</small>
                        </h2>
                    </div>
                    <div class="step__body">

                    <!-- CLIENT -->
                    <label class="control-label d-block fw-bold mb-2" for="">Tipo de cliente</label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="
                            client" id="" >
                            Estudiante
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="
                            client" >
                            Trabajador
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="
                            client" >
                            Otro
                        </label>
                    </div>

                    <!-- PAYMENT -->
                    <label class="control-label d-block fw-bold my-2" for="">Forma de pago</label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="wayToPay" id="" >
                            Efectivo
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="wayToPay" >
                            Cheque
                        </label>
                    </div>

                    <!-- CURRENCY -->
                    <label class="control-label d-block fw-bold my-2" for="">Moneda</label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="currency">
                            Cordobas
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="currency">
                            Dolares
                        </label>
                    </div>

                    <!-- CONCEPT -->
                    <div class="mt-2">
                        <label for="" class="form-label fw-bold">Concepto</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Seleccione un concepto</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    </div>

                    <div class="step__footer">
                        <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1">Siguiente</button>
                    </div>
                </div>


                <div class="step" id="step-2">
                    <div class="step__header bg-blue-gradient">
                        <h2 class="step__title">
                            Información de personal
                            <small>(Paso 2)</small>
                        </h2>
                    </div>
                    <div class="step__body">

                    <div class="my-3">
                        <label for="" class="form-label fw-bold">Fecha de Ingreso</label>
                        <input type="date" name="" id="" class="form-control" placeholder="">
                    </div>

                    <div class="my-3">
                        <label for="" class="form-label fw-bold">Valor</label>
                        <input type="number" name="" id="" class="form-control" placeholder="">
                    </div>

                    <div class="my-3">
                        <label for="" class="form-label fw-bold">La suma de</label>
                        <input type="number" name="" id="" class="form-control" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Por cuenta de</label>
                        <input type="text" name="" id="" class="form-control" placeholder="">
                    </div>

                    </div>
                    <div class="step__footer">
                        <button type="button" class="step__button step__button--back" data-to_step="1" data-step="2">Regresar</button>
                        <button type="button" class="step__button step__button--next" data-to_step="3" data-step="2">Siguiente</button>
                    </div>
                </div>
                <div class="step" id="step-3">
                    <div class="step__header bg-blue-gradient">
                        <h2 class="step__title">
                            Información X
                            <small>(Paso 3)</small>
                        </h2>
                    </div>
                    <div class="step__body">

                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Recibido de</label>
                        <input type="text" name="" id="" class="form-control" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Observaciones</label>
                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                    </div>

                    </div>
                    <div class="step__footer">
                        <button type="button" class="step__button step__button--back" data-to_step="2" data-step="3">Regresar</button>
                        <button type="submit" class="step__button">Finalizar</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="result-form w-100 ms-4">
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Cras justo odio
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Cras justo odio
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Cras justo odio
                    </div>
                </li>
            </ol>
        </div>
        </div>
    </div>
@endsection

@section("js")
    <script src="{{ asset('js/helpers/multiple-form.js') }}"></script>
@endsection
