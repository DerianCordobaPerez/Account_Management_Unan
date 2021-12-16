@extends('layouts.app', ['title' => "Usuario: $user->names"])

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                        <h4 class="text-center text-blue fw-bold">
                            Información del usuario
                        </h4>
                        <div class="blockquote-custom-icon bg-primary text-white px-2 shadow-sm"> {{$user->name}}</div>

                        <footer class="py-4 mt-4 border-top border-bottom">
                            <p><span class="text-blue">Nombre:</span> {{ $user->names }}</p>
                        <p><span class="text-blue">Email:</span> {{ $user->email }}</p>
                        </footer>

                        <div class="d-flex align-items-center justify-content-between">
                            <a href="{{route('users.index')}}" class="w-100 btn btn-primary my-2">
                                <i class="bi bi-arrow-return-left"></i> Volver
                            </a>
                            <a href="{{route('payments.index')}}" class="w-100 ms-2 btn btn-primary my-2">
                                <i class="bi bi-info-circle"></i> Información de pagos
                            </a>
                        </div>
                    </blockquote>

                </div>
            </div>
        </div>
    </section>
@endsection
