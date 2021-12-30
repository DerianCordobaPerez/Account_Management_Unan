@extends('layouts.app' , ['title' => 'Moneda'])

@section('content')

    <form action="" class="form">
        <h2 class="title-form">Moneda</h2>
        <h4 class="data-form">
            <i class="bi bi-caret-down-fill"></i>
            Datos Generales
        </h4>
        <hr>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="" class="control-label d-block fw-bold mb-2">Nombre: </label>
                    <input type="text" name="" id="" class="form-control" placeholder="Ingrese el nombre">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="" class="control-label d-block fw-bold mb-2">Abreviacion: </label>
                    <input type="text" name="" id="" class="form-control" placeholder="Ingrese la abreviacion">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="" class="control-label d-block fw-bold mb-2">Pais: </label>
                    <input type="text" name="" id="" class="form-control" placeholder="Ingrese el pais de origen">
                </div>
            </div>
        </div>

        <div class="mb-3  text-center">
            <button type="submit" value="Enviar" class="btn btn-success w-25"> Enviar <i class="bi bi-arrow-right"></i>
            </button>

        </div>

    </form>
@endsection
