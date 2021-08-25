@extends('layouts.main')

@section('content')
  <div>
    <div>
      <h1>Registro</h1>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <form action='{{ route('auth.save-user') }}' method='POST'>
        @csrf
        <div class='form-group'>
          <label for='name'>Name</label>
          <input type='text' name='name' class='form-control' id='name' placeholder='Nombre'>
        </div>
        <br>
        <div class='form-group'>
          <label for='email'>Email</label>
          <input type='email' name='email' class='form-control' id='email' placeholder='name@example.com'>
        </div>
        <br>
        <div class='form-group'>
          <label for='password'>Contraseña</label>
          <input type='password' name='password' class='form-control' id='password' placeholder='Contraseña'>
        </div>
        <br>
        <div class='form-group'>
          <label for='password_confirmation'>Confirmar contraseña</label>
          <input type='password' name='password_confirmation' class='form-control' id='password_confirmation' placeholder='Confirmar contraseña'>
        </div>
        <br>
        <div class='form-group'>
          <div class='col-sm-10'>
            <button type='submit' class='btn btn-primary'>
              Registrar
            </button>
            <a href="{{ route('auth.login') }}" class='btn btn-outline-secondary'>
              Iniciar sesión
            </a> 
            <a href="{{ route('homepage') }}" class='btn btn-secondary'>
              Cancelar
            </a> 
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection