<x-layout title="Creación de conceptos">
        <form action="{{ route('concepts.store') }}" method="POST" class="form bg-white p-4">
            @csrf
            <h2 class="title-form"> Creacion de conceptos</h2>
            <h4 class="data-form">
                <i class="bi bi-caret-down-fill"></i>
                Datos Generales
            </h4>
            <hr>

            <div class="mb-3">
                <label for="name" class="control-label d-block fw-bold mb-2">Nombre: </label>
                <input type="text" name="name" id="name" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="price" class="control-label d-block fw-bold mb-2">Precio: </label>
                <input type="number" name="price" id="price" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="description" class="control-label d-block fw-bold mb-2">Descripción: </label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>

            <div class="mb-3  text-center">
                <button type="submit" value="Enviar" class="btn btn-success w-25">
                    Enviar
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </form>
</x-layout>
