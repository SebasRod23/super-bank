@extends('layouts.main')

@section('content')
    <div class='row'>
    <div class='col-12'>
      <h1>Crear movimiento</h1>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <form action='{!! route('movement.create-movement', ['accountId'=>$account->id]) !!}' method='POST'>
        @csrf
        <div class='form-group'>
          <label for='name'>Nombre del movimiento</label>
          <input type='text' name='name' class='form-control' placeholder='Nombre'>
          <label for='amount'>Monto del movimiento</label>
          <input type='number' name='amount' class='form-control' placeholder='Monto'>
          <label for='type'>Tipo de movimiento</label>
          <select class="form-select" aria-label="Default select example" name="type">
            <option value="1" selected>Ingreso</option>
            <option value="2">Gasto</option>
          </select>
        </div>
        <br>
        <div class='form-group row'>
          <div class='col-sm-10'>
            <button type='submit' class='btn btn-primary'>
              Crear movimiento
            </button>
            <a href="{!! route('account.manage', ['accountId'=>$account->id]) !!}" class='btn btn-secondary'>
              Cancelar
            </a> 
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection