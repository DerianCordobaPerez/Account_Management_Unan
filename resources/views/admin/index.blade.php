<x-layout title="Panel de administración">
    <div class="row mb-4">
        <div class="col-md-4">
            <x-card title='Conceptos'>
                <div class="d-flex justify-content-between">
                    <div class="text-blue">
                        <h1>{{$concepts}}</h1>
                        <p>Conceptos existentes</p>
                    </div>

                    <div class="d-flex flex-column align-items-end">
                        <i class="bi bi-clipboard-check fs-1"></i>
                        <span>Conceptos</span>
                    </div>
                </div>

                <x-slot name="footer">
                    <a href="{{route('concepts.index')}}">
                        Ver detalles
                        <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </x-slot>
            </x-card>
        </div>

        <div class="col-md-4">
            <x-card title='Pagos'>
                <div class="d-flex justify-content-between">
                    <div class="text-blue">
                        <h1>{{$payments}}</h1>
                        <p>Pagos registrados</p>
                    </div>

                    <div class="d-flex flex-column align-items-end">
                        <i class="bi bi-credit-card-2-front-fill fs-1"></i>
                        <span>Pagos</span>
                    </div>
                </div>

                <x-slot name="footer">
                    <a href="{{route('payments.index')}}">
                        Ver detalles
                        <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </x-slot>
            </x-card>
        </div>

        <div class="col-md-4">
            <x-card title='Usuarios'>
                <div class="d-flex justify-content-between">
                    <div class="text-blue">
                        <h1>{{$users}}</h1>
                        <p>Usuarios habilitados</p>
                    </div>

                    <div class="d-flex flex-column align-items-end">
                        <i class="bi bi-people-fill fs-1"></i>
                        <span>Usuarios</span>
                    </div>
                </div>

                <x-slot name="footer">
                    <a href="{{route('users.index')}}">
                        Ver detalles
                        <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </x-slot>
            </x-card>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <x-card title='Roles'>
                <div class="d-flex justify-content-between">
                    <div class="text-blue">
                        <h1>{{$roles}}</h1>
                        <p>Cantidad de roles</p>
                    </div>

                    <div class="d-flex flex-column align-items-end">
                        <i class="bi bi-toggles fs-1"></i>
                        <span>Roles</span>
                    </div>
                </div>

                <x-slot name="footer">
                    <a href="{{route('roles.index')}}">
                        Ver detalles
                        <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </x-slot>
            </x-card>
        </div>
    </div>
</x-layout>
