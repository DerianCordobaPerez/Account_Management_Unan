@extends('layouts.app', ['title' => 'Modificación de Roles'])

@section('content')
    <form action="{{route('roles.update', $role->id)}}" method="POST" class="form shadow">
        @csrf
        @method('PUT')

        <h2 class="title-form">Modificación de roles</h2>
        <h4 class="data-form">
            <i class="bi bi-caret-down-fill"></i>
            Datos Generales
        </h4>
        <hr>

        <div class="row mt-2 p-2">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del rol" value="{{$role->name}}" required>
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" cols="10" rows="5" class="form-control" placeholder="Descripción del rol">{{$role->description ?? ''}}</textarea>
                </div>
            </div>

            <div class="border-start col-md-8">

            </div>
        </div>

        <div class="btn-group mt-2 d-flex gap-2">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{url()->previous()}}" class="btn btn-dark">Regresar</a>
        </div>
    </form>
@endsection

@section('js')
    <script src="{{asset('js/utils/validateCheckboxs.js')}}"></script>
@endsection

