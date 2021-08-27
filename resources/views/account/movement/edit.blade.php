@extends('layouts.main')

@section('content')
    <div class='row'>
    <div class='col-12'>
      <h1>Editar movimiento</h1>
      @if ($errors->any())
        <div class='alert alert-danger'>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <form action='{!! route('movement.edit-movement', ['accountId'=>$accountId, 'movementId'=>$movement->id]) !!}' method='POST'>
        @csrf
        <div class='form-group   mb-3'>
          <label for='name'>Nombre del movimiento</label>
          <input type='text' name='name' class='form-control  mb-3' placeholder='Nombre' value='{{$movement->name}}'>
          <label for='amount'>Monto del movimiento</label>
          <input type='number' name='amount' class='form-control   mb-3' placeholder='Monto' value='{{abs($movement->amount)}}' step='any'>
          <label for='type'>Tipo de movimiento</label>
          <select class='form-select' aria-label='Default select example' name='type'>
            @if ($movement->type == 'Income')
                <option value='Income' selected>Ingreso</option>
                <option value='Expense'>Gasto</option>
            @else
                <option value='Income'>Ingreso</option>
                <option value='Expense' selected>Gasto</option>
            @endif
          </select>
        </div>
        <div class='form-group row'>
          <div class='col-sm-10'>
            <button type='submit' class='btn btn-primary'>
              Guardar cambios
            </button>
            <a href='{!! route('movement.delete', ['accountId'=>$accountId, 'movementId'=>$movement->id]) !!}' class='btn btn-danger'>
              Eliminar
            </a> 
            <a href='{!! route('account.manage', ['accountId'=>$accountId]) !!}' class='btn btn-secondary'>
              Cancelar
            </a> 
            
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection