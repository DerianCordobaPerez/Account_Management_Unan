<x-layout title="Registro de Moneda">
    <form action="{{route('currencies.store')}}" method="POST" class="form bg-white p-4">
        @csrf
        <h2 class="title-form">Registro de Moneda</h2>
        <h4 class="data-form">
            <i class="bi bi-caret-down-fill"></i>
            Datos Generales
        </h4>
        <hr>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="control-label d-block fw-bold mb-2">Nombre: </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="abbreviation" class="control-label d-block fw-bold mb-2">Abreviación: </label>
                    <input type="text" name="abbreviation" id="abbreviation" class="form-control" placeholder="Abreviación">
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="country" class="control-label d-block fw-bold mb-2">Pais: </label>
                    <input type="text" name="country" id="country" class="form-control" placeholder="Pais de origen">
                </div>
            </div>
        </div>

        <div class="mb-3  text-center">
            <button type="submit" value="Enviar" class="btn btn-success w-25">
                <i class="bi bi-arrow-right"></i>
                Enviar
            </button>
        </div>
    </form>
</x-layout>
