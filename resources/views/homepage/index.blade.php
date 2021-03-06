@extends('layouts.main')

@section('content')
    <h1>Súper Banco</h1>
    @auth
    <p>
        <p>{{ auth()->user()->email }}</p>     
        <a href='{{ route('auth.logout') }}' class='btn btn-danger'>
            Cerrar sesión
        </a>
        <br><br>
        <hr>
        <br>
        <a href='{{ route('account.create') }}' class='btn btn-primary mb-3'>
            Crear cuenta
        </a>
        <div class='list-group'>
            @foreach($accounts as $account)
                <a href='{!! route('account.manage', ['accountId'=>$account->id]) !!}' class='list-group-item list-group-item-action'>
                    {{ $account->name }} - Saldo: ${{ $account->balance }}
                </a>
            @endforeach
        </div>
    </p>
    @endauth
    @guest
    <p>
        <br>
        <a href='{{ route('auth.login') }}' class='btn btn-primary'>
            Inicia sesión
        </a>
    </p>
    @endguest
@endsection