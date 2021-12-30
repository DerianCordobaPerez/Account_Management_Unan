@extends('layouts.app' , ['title' => 'Creacion de conceptos'])

@section('content')

    <form action="" class="form">
        <h2 class="title-form"> Crear conceptos</h2>
        <div class="mb-3">
            <label for="" class="form-label">Nombre: </label>
            <input type="text" name="" id="" class="form-control" placeholder="Ingrese el nombre">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Precio: </label>
            <input type="number" name="" id="" class="form-control" placeholder="Ingrese el precio">
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Descripcion: </label>
          <textarea class="form-control" name="" id="" rows="3" placeholder="Ingrese una descripcion"></textarea>
        </div>
    </form>
@endsection
