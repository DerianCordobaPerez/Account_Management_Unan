@extends('layouts.app', ['title' => "Usuario: $user->names"])

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                        <h4 class="text-muted">
                            Información del usuario
                        </h4>
                        <div class="blockquote-custom-icon bg-primary text-white px-2 shadow-sm"> {{$user->name}}</div>

                        <footer class="py-4 mt-4 border-top border-bottom">
                            <p class="mb-0 mt-2 font-italic fs-6">{{$user->names}}</p>
                            <p class="mb-0 mt-2 font-italic fs-6">{{$user->email}}</p>
                        </footer>

                        <div class="d-flex align-items-center justify-content-between">
                            <a href="{{route('users.index')}}" class="btn btn-primary my-2">Aceptar</a>
                            <a href="{{route('users.index')}}" class="btn btn-success my-2">Información de pagos</a>
                        </div>
                    </blockquote>

                </div>
            </div>
        </div>
    </section>
@endsection
