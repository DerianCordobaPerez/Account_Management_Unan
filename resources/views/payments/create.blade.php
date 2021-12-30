@extends('layouts.app', ['title' => 'Creación de Pago'])

@section('content')
    <form class="form">
        <h2 class="title-form">Creacion de Pago</h2>
        <h4 class="data-form">
            <i class="bi bi-caret-down-fill"></i>
            Datos Generales
        </h4>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <label class="control-label d-block fw-bold mb-2" for="">Forma de pago</label>
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
            </div>

            <div class="col-md-3">
                <label class="control-label d-block fw-bold mb-2" for="">Moneda</label>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="currency" id="">
                        Cordobas
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="currency">
                        Dolares
                    </label>
                </div>
            </div>

            <div class="col-md-3 mt-4">
                <article class="fw-bold change">Tipo de Cambio: <span>C$ {{$exchangeRate}}</span></article>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="my-3">
                  <label for="" class="form-label fw-bold">Fecha de Ingreso</label>
                  <input type="date" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="my-3">
                  <label for="" class="form-label fw-bold">Valor</label>
                  <input type="number" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 my-3">
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
            </div>

            <div class="col-md-6">
                <div class="my-3">
                  <label for="" class="form-label fw-bold">La suma de</label>
                  <input type="number" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label fw-bold">Por cuenta de</label>
                  <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Recibido de</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                  </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label fw-bold">Concepto</label>
                  <textarea class="form-control" name="" id="" rows="3"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label fw-bold">Observaciones</label>
                  <textarea class="form-control" name="" id="" rows="3"></textarea>
                </div>
            </div>
        </div>

        <div>
            <h4 class="data-form"><i class="bi bi-caret-down-fill"></i>Datos Ingresos</h4>
            <hr>
            <button class="btn btn-success">Agregar</button>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered mt-3">
                    <thead class="bg-blue-gradient text-white">
                        <tr>
                            <th>Tipo de Operacion</th>
                            <th>Ingresos por</th>
                            <th>Organica</th>
                            <th>Cuenta/Ordinal</th>
                            <th>Monto</th>
                            <th>Rentencion</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tr>
                        <td>
                            <div class="mb-3">
                            <select class="form-control" name="" id="">
                                <option>Presupuestaria</option>
                                <option>option1</option>
                                <option>option2</option>
                            </select>
                            </div>
                        </td>
                        <td>
                            <div class="mb-3">
                            <select class="form-control" name="" id="">
                                <option>Seleccione una</option>
                                <option>option1</option>
                                <option>option2</option>
                            </select>
                            </div>
                        </td>
                        <td>
                            <div class="mb-3">
                            <select class="form-control" name="" id="">
                                <option>Seleccione una</option>
                                <option>option1</option>
                                <option>option2</option>
                            </select>
                            </div>
                        </td>
                        <td><input type="search" name="" id="" class="form-control"></td>
                        <td><input type="text" name="" id="" class="form-control"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <div class="col-md-4">
                <div class="mb-3 d-flex justify-content-between">
                    <label for="" class="form-label">Distribuido:</label>
                    <span class="text-success">0.00/0.00</span>
                  </div>

                <div class="mb-3 d-flex align-items-center">
                  <label for="" class="form-label w-25 me-2">Sub Total:</label>
                  <input type="text" name="" id="" class="form-control" placeholder="">
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="" class="form-label w-50">Total Retencion:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                  </div>

                  <div class="mb-3 d-flex align-items-center">
                    <label for="" class="form-label me-2">Total:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                  </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-success me-1"value="Finalizar">
            <input type="reset" class="btn btn-dark ms-1"value="Regresar">
        </div>
    </form>
@endsection
