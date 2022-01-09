<x-layout title="Iniciar sesión">
    <div class="container contact-form">
        <div class="contact-image">
            <img src="{{ asset('img/logos/UNAN.png')}}" alt="Unan"/>
        </div>

        <x-form method="POST" action="{{ route('login') }}">
            @csrf

            <x-field name="email" label="Correo" type="email" value="{{old('email')}}" />

            <x-field name="password" label="Contraseña" type="password" />

            <x-field name="remember" type="checkbox" label="Recordarme" checked="{{old('remember') ? 'checked' : ''}}" />

            <div class="form-group">
                <x-button title="Iniciar sesión" class="btn btn-primary me-3" type="submit" />

                @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Recuperar contraseña') }}
                    </a>
                @endif
            </div>
        </x-form>
    </div>
</x-layout>
