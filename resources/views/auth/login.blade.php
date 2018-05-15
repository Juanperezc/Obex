@extends('layouts.blank')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
<img class="logo-login"src="/images/logo.png"></img>

            </div>
            <h3>Bienvenido a Obex</h3>
            <p>
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Correo" value="{{ old('email') }}" required="">
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group">
                   <input id="password" type="password" name="password" class="form-control" placeholder="Contraseña" required="">
                   <span class="input-group-btn"><button-password></button-password></span></div>
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>

                <a href="#">¿Olvidaste tu contraseña?</a>
                <br>
                <a href="#">Contacta con el administrador</a>
            </form>
            
        </div>
  


</div>

@endsection
