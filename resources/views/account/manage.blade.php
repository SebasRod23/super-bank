@extends('layouts.main')

@section('content')
  <div class='row'>
    <div class='col-12'>
      <h1>Administra tu cuenta</h1>
      <form action='{!! route('account.update', ['accountId'=>$account->id]) !!}' method='POST'>
        @csrf
        <div class='form-group mb-3'>
          <label for='name'>Nombre de la cuenta</label>
          <div class='row'>
              <div class='col'>
                <input type='text' name='name' class='form-control' id='name' placeholder='Nombre' value='{{ $account->name }}'>
              </div>
              <div class='col'>
                <button type='submit' class='btn btn-primary'>
                  Actualizar nombre
                </button>
              </div>
          </div>
        </div>
      </form>
      <h5 class='mb-3'>Saldo: ${{ $account->balance }}</h5>
      <a href='{!! route('account.delete', ['accountId'=>$account->id]) !!}' class='btn btn-danger'>
        Eliminar cuenta
      </a>
      <a href='{{ route('homepage') }}' class='btn btn-secondary'>
        Regresar a inicio
      </a> 
      <hr>
      <a href='{!! route('movement.create', ['accountId'=>$account->id]) !!}' class='btn btn-primary mb-3'>
        Crear movimiento
      </a> 
      <div class='list-group'>
        <div class='row'>
            @foreach($movements as $movement)
              <div class='col-sm-4'>
                <div class='card {{ $movement->type == 'Income' ? 'border-success' : 'border-danger' }} mb-3'>
                  <div class='card-body'>
                    <h5 class='card-title '>$ {{$movement->amount}}</h5>
                    <p class='card-text'>{{$movement->name}}</p>
                    <a href='{!! route('movement.edit', ['accountId'=>$account->id, 'movementId'=>$movement->id]) !!}' class='btn btn-primary'>Editar</a>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection