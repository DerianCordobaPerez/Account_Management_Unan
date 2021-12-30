@extends('layouts.app', ['title' => 'Creacion de Roles'])

@section('content')
    <form action="{{route('roles.create')}}" class="form">
        <h2 class="title-form">Creacion de roles</h2>

        <div class="row mt-2 p-2">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del rol">
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" cols="10" rows="5" class="form-control" placeholder="Descripción del rol"></textarea>
                </div>
            </div>

            <div class="border-start col-md-8">
                <label class="mx-2 fw-bold">
                    Seleccionar todos los privilegios
                    <input id="all_privileges" type="checkbox" onclick="toggle(this)">
                </label>

                <div class="row mt-2">
                    @foreach ($privileges as $privilege)
                        <div class="col-md-4">
                            <label class="mx-2">
                                <input type="checkbox" name="privileges[]" value="{{$privilege->id}}">
                                {{$privilege->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
@endsection
