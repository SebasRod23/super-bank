@extends('layouts.main')

@section('content')
  <div class='row'>
    <div class='col-12'>
      <h1>Administra tu cuenta</h1>
      <form action='{!! route('account.update', ['accountId'=>$account->id]) !!}' method='POST'>
        @csrf
        <div class='form-group'>
          <label for='name'>Nombre de la cuenta</label>
          <div class="row">
              <div class="col">
                <input type='text' name='name' class='form-control' id='name' placeholder='Nombre' value='{{ $account->name }}'>
              </div>
              <div class="col">
                <button type='submit' class='btn btn-primary'>
                  Actualizar nombre
                </button>
              </div>
          </div>
        </div>
      </form>
      <br>
      <h5>Saldo: ${{ $account->balance }}</h5>
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