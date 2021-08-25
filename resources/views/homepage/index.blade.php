@extends('layouts.main')

@section('content')
    <h1>Súper Banco</h1>
    @auth
    <p>
        <p>{{ auth()->user()->email }}</p>
        <br>
        <a href="{{ route('auth.logout') }}" class="btn btn-primary">
            Cerrar sesión
        </a>
    </p>
    @endauth
    @guest
    <p>
        <a href="{{ route('auth.login') }}" class='btn btn-primary'>
            Inicia sesión
        </a>
    </p>
    @endguest
@endsection