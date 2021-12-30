@extends('layouts.app' , ['title' => 'Creacion de conceptos'])

@section('content')

    <form action="" class="form">
        <h2 class="title-form"> Creacion de conceptos</h2>
        <h4 class="data-form">
            <i class="bi bi-caret-down-fill"></i>
            Datos Generales
        </h4>
        <hr>

        <div class="mb-3">
            <label for="" class="control-label d-block fw-bold mb-2">Nombre: </label>
            <input type="text" name="" id="" class="form-control" placeholder="Ingrese el nombre">
        </div>

        <div class="mb-3">
            <label for="" class="control-label d-block fw-bold mb-2">Precio: </label>
            <input type="number" name="" id="" class="form-control" placeholder="Ingrese el precio">
        </div>

        <div class="mb-3">
            <label for="" class="control-label d-block fw-bold mb-2">Descripcion: </label>
            <textarea class="form-control" name="" id="" rows="3" placeholder="Ingrese una descripcion"></textarea>
        </div>
        
        <div class="mb-3  text-center">
            <button type="submit" value="Enviar" class="btn btn-success w-25"> Enviar <i class="bi bi-arrow-right"></i>
            </button>

        </div>

    </form>
@endsection
