<x-layout title="Creación de Roles">
    <form action="{{route('roles.store')}}" method="POST" class="form shadow bg-light p-4">
        @csrf
        <h2 class="title-form">Creacion de roles</h2>
        <h4 class="data-form">
            <i class="bi bi-caret-down-fill"></i>
            Datos Generales
        </h4>
        <hr>

        <div class="row mt-2 p-2">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del rol" required>
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" cols="10" rows="5" class="form-control" placeholder="Descripción del rol"></textarea>
                </div>
            </div>

            <div class="border-start col-md-8">

            </div>
        </div>

        <div class="btn-group d-flex gap-2 w-50 m-auto mt-4">
            <button type="submit" class="btn btn-success">Crear</button>
            <a href="{{url()->previous()}}" class="btn btn-dark">Regresar</a>
        </div>
    </form>
</x-layout>
