@extends('layouts.app')

@section('content')

<div id="login">
    <h3 class="text-center text-white pt-5"></h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form method="POST"  id="login-form" class="form" action="{{ route('login') }}">
                        @csrf
                        <h3 class="text-center text-info"><a class="navbar-brand text-info" href="{{ route('homeCourier') }}">
                            <img src="../newTem/dist/img/favicon.png" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">  COURIER
                        </a></h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Usuario:</label><br>
                            <input type="text" name="user" id="user" class="form-control @error('user') is-invalid @enderror" value="{{ old('user') }}" required autocomplete="user" autofocus>
                            @error('user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Contraseña:</label><br>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"  required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group text-center">
                           
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Iniciar Sesión">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
