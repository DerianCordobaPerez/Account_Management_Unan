@extends('layouts.app', ['title' => 'Gestion de conceptos'])

@section('content')

<div class="col-md-4 d-flex justify-content-start">
    <a href="{{ route('concepts.create') }}" class="btn bg-blue-gradient btn-sm text-white mb-2 font-weight-bold shadow-sm">
        <i class="fas fa-plus"></i>
        Nuevo concepto
    </a>
</div>

@endsection