@extends('layouts.main')

@section('content')
  <div class='row'>
    <div class='col-12'>
      <h1>Administra tu cuenta</h1>
      <h4>{{ $account->name }}</h4>
      <h4>Saldo: ${{ $account->balance }}</h4>
      <br>
      <a href="{!! route('account.delete', ['accountId'=>$account->id]) !!}" class='btn btn-danger'>
        Eliminar cuenta
      </a>
      <a href="{{ route('homepage') }}" class='btn btn-secondary'>
        Regresar a inicio
      </a> 
      <hr>
    </div>
  </div>
@endsection