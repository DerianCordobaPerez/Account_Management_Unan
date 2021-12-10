@extends('layouts.app')

@section('content')
    @if(count($users) > 0)
        <table class="table table-light table-striped mt-4">
            <tr>
                <th scope="col">Información </th>
                <th scope="col">Acciones </th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>
                        <p class="d-block">
                            <a class="text-dark" href="{{route('users.show', $user->id)}}">
                                {{$user->name}} | {{$user->email}}
                            </a>
                        </p>
                    </td>

                    <td>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">
                            <i class="bi bi-pencil"></i>
                            Editar
                        </a>
                        <form action="{{route('users.destroy', $user->id)}}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No hay usuarios registrados</p>
       
    @endif
@endsection
