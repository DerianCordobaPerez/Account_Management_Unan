@extends('layouts.app', ['title' => 'Modificación de roles'])

@section('content')
    <form action="{{route('users.store.role', $user->id)}}" method="POST" class="form">
        @csrf
        <h2 class="title-form">Modificación de roles</h2>
        <h4 class="data-form">
            <i class="bi bi-caret-down-fill"></i>
            Datos Generales
        </h4>
        <hr>

        <div class="row mt-2">
            <div class="col-md-4">
                <div class="info-user">
                    <span class="fw-bold">
                        Nombre:
                    </span>
                    {{$user->names}}
                </div>

                <div class="info-user-roles">
                    <span class="fw-bold">
                        Roles:
                    </span>

                    @if(count($user->roles) == 0)
                        <span class="badge bg-primary">Sin roles asignados</span>
                        <p class="text-muted e">
                            <i class="bi bi-info-circle"></i>
                            Precaución: el usuario no contiene ningún rol.
                        </p>
                    @endif

                    @foreach ($user->roles as $role)
                        <span class="badge bg-primary">{{$role->name}}</span>
                    @endforeach

                    @if($user->roles->contains('name', 'usuario'))
                        <p class="text-muted e">
                            <i class="bi bi-info-circle"></i>
                            Precaución: el usuario tiene un nivel de acceso bajo.
                        </p>
                    @endif
                </div>
            </div>

            <div class="col-md-8">
                <div class="info-roles">
                    <span class="fw-bold">
                        Roles disponibles:
                    </span>

                    @foreach($roles as $role)
                        <input type="checkbox" name="roles[]"
                               id="roles" value="{{$role->id}}"
                               @if($user->roles->contains($role->id)) checked @endif
                        />
                        <label for="roles">{{$role->name}}</label>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i>
                    Guardar
                </button>
            </div>
        </div>
    </form>
@endsection
