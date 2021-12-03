@extends('layouts.app')

@section('content')
    <div class="mt-4 row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Usuario: {{$user->name}}</h4>
                </div>

                <div class="card-body">
                    <p>{{$user->name}}</p>
                    <p>{{$user->email}}</p>
                </div>

                <div class="card-footer">
                    <a href="{{route('users.index')}}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
