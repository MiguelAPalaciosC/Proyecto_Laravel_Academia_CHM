@extends('layouts.app')

@section('content')
<div class="wrapper" id="panelprincipal">
  <div class="container" id="glass">
    <div class="row">
      <div class="col-md-6 col-md-offset-3" >
        <div class="panel login panel-default login-glass" id="prueba">
          <div class="login panel-heading" id="prueba"><strong id="textlogin">Iniciar Sesion</strong></div>
          <div class="login panel-body" id="prueba">
            <form class="form-horizontal" method="POST" action="{{ url('/login') }}">
              {{ csrf_field() }}
              <div class=" row mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label id="textonav" for="email" class="col-sm-3 col-form-label"><strong>Correo</strong></label>
                <div class="col-md-9">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>
              </div>
              <div class="row mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label id="textonav" for="password" class="col-sm-3 col-form-label"><strong>Contraseña</strong></label>
                <div class="col-md-9">
                  <input id="password" type="password" class="form-control" name="password" required>
                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                  <button id="botonlogin" type="submit" class="btn btn-primary">Iniciar Sesion</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection