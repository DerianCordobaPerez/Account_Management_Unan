@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">

                <!-- CUSTOM BLOCKQUOTE -->
                <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                    <div class="blockquote-custom-icon bg-primary text-white px-2 shadow-sm"> {{$user->name}}</div>
                    
                    <footer class="py-4 mt-4 border-top border-bottom">
                        <p class="mb-0 mt-2 font-italic fs-6">{{$user->name}}</p>
                        <p class="mb-0 mt-2 font-italic fs-6">{{$user->email}}</p>
                    </footer>
                    
                   <a href="{{route('users.index')}}" class="btn btn-primary my-2">Aceptar</a>
                </blockquote><!-- END -->

            </div>
        </div>
    </div>
</section>
    <!--<div class="mt-4 row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{$user->name}}</h4>
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
    </div>-->
@endsection
