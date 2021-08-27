@extends('layouts.main')

@section('content')
  <div class='row'>
    <div class='col-12'>
      <h1>Inicia sesión</h1>
      @if ($errors->any())
        <div class='alert alert-danger'>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <form action='{{ route('auth.login-auth') }}' method='GET'>
        @csrf
        <div class='form-group mb-3'>
          <label for='email'>Email</label>
          <input type='email' name='email' class='form-control' id='email' placeholder='name@example.com'>
        </div>
        <div class='form-group mb-3'>
          <label for='password'>Contraseña</label>
          <input type='password' name='password' class='form-control' id='password' placeholder='Contraseña'>
        </div>
        <div class='form-group row'>
          <div class='col-sm-10'>
            <button type='submit' class='btn btn-primary'>
              Iniciar sesión
            </button>
            <a href='{{ route('auth.register') }}' class='btn btn-outline-secondary'>
              Registrar
            </a> 
            <a href='{{ route('homepage') }}' class='btn btn-secondary'>
              Cancelar
            </a> 
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection