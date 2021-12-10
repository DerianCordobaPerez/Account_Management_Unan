@extends('layouts.app', ['title' => 'Panel principal'])

@section('content')

    <form class="d-flex justify-content-end">
        <div class="input-group m-4 w-25">
            <input type="email" class="form-control" placeholder="Barra de busqueda">
            <span class="input-group-btn">
            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
        </span>
        </div>
    </form>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="progress-outer">
                    <div class="progress">
                        <div class="progress-bar progress-bar-info progress-bar-striped active"
                             style="width:80%; box-shadow:-1px 10px 10px rgba(91, 192, 222, 0.7);"></div>
                        <div class="progress-value">80%</div>
                    </div>
                </div>
                <div class="progress-outer">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped active"
                             style="width:60%; box-shadow:-1px 10px 10px rgba(116, 195, 116,0.7);"></div>
                        <div class="progress-value">60%</div>
                    </div>
                </div>
                <div class="progress-outer">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active"
                             style="width:40%; box-shadow:-1px 10px 10px rgba(240, 173, 78,0.7);"></div>
                        <div class="progress-value">40%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
