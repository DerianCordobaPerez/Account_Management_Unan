@extends('layouts.app', ['title' => 'Panel principal'])

@section('content')

    

    <div class="container mt-4">
        <div class="row">
            <!-- card 1 -->

            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                      <h5 class="text-blue fw-bold"> Información del usuario</h5>
                    </div>
                    <div class="card-body">
                        <p><span class="text-blue">Nombre:</span> {{ auth()->user()->names }}</p>
                        <p><span class="text-blue">Email:</span> {{ auth()->user()->email }}</p>
                    </div>
                </div>

                <!-- card 2 -->
                <div class="mt-4">@include('home.accordion')</div>
                
            </div>

            <!-- card 3 -->
            <div class="col-md-6">
              <form class="d-flex justify-content-end">
                <div class="input-group mb-4 w-100">
                    <input type="email" class="form-control" placeholder="Barra de busqueda">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                    </span>
                </div>
            </form> 

                @include('home.lastbill')
            </div>
        </div>
    </div>



@endsection
