@extends('layouts.app', ['title' => 'Panel de administración'])

@section('content')
    <div class="row mb-4">
        <div class="col-md-4">
            <x-card title='Definir Conceptos'>
                aqui definimos conceptos ahuevo
            </x-card>
        </div>

        <div class="col-md-4">
            <x-card title='Pagos'>
                aqui definimos conceptos ahuevo
            </x-card>
        </div>

        <div class="col-md-4">
            <x-card title='Usuarios'>
                aqui definimos conceptos ahuevo
            </x-card>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <x-card title='Roles'>
                <div class="row">
                    <div class="col-md-6">
                        @foreach($roles as $role)
                            {{ $role->name }}
                        @endforeach
                    </div>

                    <div class="col-md-6">
                        @foreach($roles as $role)
                            <a href="{{route('roles.edit', $role->id)}}" class="text-blue">
                                <i class="bi bi-pencil-square"></i>
                                Editar
                            </a>
                        @endforeach
                    </div>
                </div>

                <x-slot name="footer">
                    Ver todos los roles
                </x-slot>
            </x-card>
        </div>
    </div>

@endsection
