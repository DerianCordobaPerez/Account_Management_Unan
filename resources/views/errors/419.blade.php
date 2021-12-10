@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">419 - Pagina expirada</div>

                <div class="card-body">
                    <p>Su sesión ha expirado, por favor ingrese nuevamente.</p>
                    <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
