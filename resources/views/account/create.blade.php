@extends('layouts.main')

@section('content')
  <div class='row'>
    <div class='col-12'>
      <h1>Crear cuenta</h1>
      @if ($errors->any())
        <div class='alert alert-danger'>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <form action='{{ route('account.create-account') }}' method='POST'>
        @csrf
        <div class='form-group mb-3'>
          <label for='name'>Nombre de la cuenta</label>
          <input type='text' name='name' class='form-control' id='name' placeholder='Nombre'>
        </div>
        <div class='form-group row'>
          <div class='col-sm-10'>
            <button type='submit' class='btn btn-primary'>
              Crear cuenta
            </button>
            <a href='{{ route('homepage') }}' class='btn btn-secondary'>
              Cancelar
            </a> 
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection