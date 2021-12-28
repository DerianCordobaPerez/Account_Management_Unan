@extends('layouts.app', ['title' => 'Gestión de usuarios'])

@section('content')
    {{Breadcrumbs::render()}}

    @if(count($users) > 0)
        <div class="table-responsive mt-2">
            <table class="table table-striped table-bordered sortable align-middle">
                <thead class="bg-blue-gradient text-white">
                    <tr>
                        <th scope="col">Información</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                    <tr class="table-light">
                        <td>
                            <p class="d-block">
                                <a class="text-dark" href="{{route('users.show', $user->id)}}">
                                    <span>{{$user->names}}</span>
                                    <span class="mx-2">|</span>
                                    <span>{{$user->email}}</span>
                                </a>
                            </p>
                        </td>
    
                        <td>
                            <a href="{{route('users.show', $user->id)}}" class="btn bg-blue-gradient text-white">
                                <i class="bi bi-pencil"></i>
                                Ver
                            </a>
    
                            <a href="{{route('users.payments', $user->id)}}" class="btn btn-success">
                                <i class="bi bi-credit-card-2-front"></i>
                                Pagos
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <p>No hay usuarios registrados</p>
    @endif
@endsection

@section('js')
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
@endsection